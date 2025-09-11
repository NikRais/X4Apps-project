const $ = (s, root = document) => root.querySelector(s);
const $$ = (s, root = document) => [...root.querySelectorAll(s)];
const fmt = n => `€${Number(n).toFixed(2)}`;

// Cookie
(function cookieConsent(){
    const banner = document.getElementById('cookieBanner');
    if(!banner) return;
    const key = 'hs_cookie_consent_v1';
    const saved = localStorage.getItem(key);
    if(!saved) banner.hidden = false;
    banner.addEventListener('click', e => {
        const btn = e.target.closest('[data-cookie]');
        if(!btn) return;
        const choice = btn.dataset.cookie === 'accept' ? 'accepted' : 'necessary';
        localStorage.setItem(key, choice);
        banner.hidden = true; // закрыли баннер
    });
    const openConsent = document.getElementById('openConsent');
    if(openConsent){
        openConsent.addEventListener('click', ()=>{ banner.hidden = false; });
    }
})();

// Cart in localStorage
const CART_KEY = 'hs_cart_v1';
const getCart = () => JSON.parse(localStorage.getItem(CART_KEY) || '[]');
const setCart = (items) => localStorage.setItem(CART_KEY, JSON.stringify(items));
const updateCartCount = () => {
    const count = getCart().reduce((s, i) => s + i.qty, 0);
    const badge = document.getElementById('cartCount');
    if(badge) badge.textContent = count;
};

// Catalog
(function catalog(){
    const cards = $$('.card');
    if(cards.length === 0) { updateCartCount(); return; }
    cards.forEach(card => {
        const id = Number(card.dataset.productId);
        const title = $('.card__title', card).textContent.trim();
        const price = Number($('.price', card).textContent.replace('€',''));
        const sku = $('.card__sku', card).textContent.replace('Артикул:','').trim();
        const qtyInput = $('.qty', card);

        card.addEventListener('click', (e)=>{
            const inc = e.target.closest('[data-action="increment"]');
            const dec = e.target.closest('[data-action="decrement"]');
            const add = e.target.closest('[data-action="add-to-cart"]');
            if(inc){ qtyInput.value = Math.max(1, Number(qtyInput.value) + 1); }
            if(dec){ qtyInput.value = Math.max(1, Number(qtyInput.value) - 1); }
            if(add){
                const cart = getCart();
                const idx = cart.findIndex(i => i.id === id);
                const qty = Math.max(1, Number(qtyInput.value));
                if(idx > -1){ cart[idx].qty += qty; } else { cart.push({ id, title, price, sku, qty }); }
                setCart(cart);
                updateCartCount();
                add.textContent = 'Добавлено';
                setTimeout(()=> add.textContent = 'В корзину', 1000);
            }
        });
    });
    updateCartCount();
})();

// Cart crud
(function cartPage(){
    const itemsWrap = document.getElementById('cartItems');
    if(!itemsWrap) return;
    const empty = document.getElementById('cartEmpty');
    const table = document.getElementById('cartTableWrap');
    const totalEl = document.getElementById('cartTotal');

    function render(){
        const cart = getCart();
        if(cart.length === 0){
            empty.hidden = false; table.hidden = true;
            updateCartCount();
            return;
        }
        empty.hidden = true; table.hidden = false;
        itemsWrap.innerHTML = cart.map((i, idx) => `
      <tr data-idx="${idx}">
        <td><strong>${i.title}</strong><br><small>SKU: ${i.sku}</small></td>
        <td>${fmt(i.price)}</td>
        <td>
          <div class="qty-row">
            <button class="btn btn--ghost" data-act="dec">−</button>
            <input class="qty" type="number" min="1" value="${i.qty}">
            <button class="btn btn--ghost" data-act="inc">+</button>
          </div>
        </td>
        <td>${fmt(i.price * i.qty)}</td>
        <td><button class="btn btn--ghost" data-act="rm">Удалить</button></td>
      </tr>
    `).join('');
        const total = cart.reduce((s,i)=> s + i.price * i.qty, 0);
        totalEl.textContent = fmt(total);
        updateCartCount();
    }

    itemsWrap.addEventListener('click', e => {
        const tr = e.target.closest('tr'); if(!tr) return;
        const idx = Number(tr.dataset.idx);
        const cart = getCart();
        const actBtn = e.target.closest('[data-act]'); if(!actBtn) return;
        const act = actBtn.dataset.act;
        if(act === 'rm'){ cart.splice(idx,1); }
        if(act === 'inc'){ cart[idx].qty += 1; }
        if(act === 'dec'){ cart[idx].qty = Math.max(1, cart[idx].qty - 1); }
        setCart(cart); render();
    });

    itemsWrap.addEventListener('change', e => {
        const input = e.target.closest('.qty'); if(!input) return;
        const tr = e.target.closest('tr'); const idx = Number(tr.dataset.idx);
        const cart = getCart();
        cart[idx].qty = Math.max(1, Number(input.value || 1));
        setCart(cart); render();
    });

    const openCheckout = document.getElementById('openCheckout');
    const orderModal = document.getElementById('orderModal');
    const success = document.getElementById('orderSuccess');
    const form = document.getElementById('checkoutForm');

    openCheckout?.addEventListener('click', ()=>{ orderModal.hidden = false; });

    form?.addEventListener('submit', (e)=>{
        e.preventDefault();
        if(!form.reportValidity()) return;
        orderModal.hidden = true;
        success.hidden = false;
        setCart([]); // clear
        render();
    });

    document.querySelectorAll('[data-close-modal]').forEach(b => b.addEventListener('click', ()=>{
        b.closest('.modal').hidden = true;
    }));

    render();
})();

// уведомление после валидной отправки
(function contactForm(){
    const form = document.getElementById('contactForm');
    if(!form) return;
    const success = document.getElementById('contactSuccess');
    form.addEventListener('submit', (e)=>{
        e.preventDefault();
        if(!form.reportValidity()) return;
        success.hidden = false;
        form.reset();
    });
    document.querySelectorAll('[data-close-modal]').forEach(b => b.addEventListener('click', ()=>{
        b.closest('.modal').hidden = true;
    }));
})();

// Header burger
(function headerMenu(){
    const burger = document.getElementById('burger');
    const mobile = document.getElementById('mobileNav');
    if(!burger || !mobile) return;
    burger.addEventListener('click', ()=>{
        const open = mobile.hidden === false;
        mobile.hidden = open; // toggle
        burger.setAttribute('aria-expanded', String(!open));
    });
})();
