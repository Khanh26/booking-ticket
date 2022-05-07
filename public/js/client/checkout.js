const baseSite = 'http://127.0.0.1:8000/';
const checkout = {
    data: {
        id_movie: document.querySelector('#id_movie').value,
        day_showtime: null,
        time_start: null,
        time_end: null,
        id_showtime: null,
        price_ticket: null,
    },

    blockDay: document.querySelector('.day_show'),
    blockTime: document.querySelector('.show_time'),
    blockChar: document.querySelector('.chair_movie'),
    blockPrice: document.querySelector('.price-ticket'),
    getTime: async function () {
        await fetch(`${baseSite}api/getTimeByDay/${this.data.id_movie}?day_showtime=${this.data.day_showtime}`)
            .then(res => res.json())
            .then(data => {
                if (data) {
                    let html = data.map(item => {
                        return `
                    <button class="btn btn-light btnC btnTime" value="${item.TIME_START}-${item.TIME_END}-${item.ID_SHOWTIME}-${item.PRICE_SHOWTIME}">${item.TIME_START.substring(0, item.TIME_START.length - 3)} - ${item.TIME_END.substring(0, item.TIME_END.length - 3)}</button>
                    `
                    }).join('');
                    this.blockTime.innerHTML = html;
                }
            })
        let btnTime = document.querySelectorAll('.btnTime')
        btnTime.forEach(element_time => {
            element_time.addEventListener('click', () => {
                btnTime.forEach(item_time => {
                    item_time.classList.remove('act');
                })
                element_time.classList.add('act');
                this.data.time_start = element_time.value.split("-")[0]
                this.data.time_end = element_time.value.split("-")[1]
                this.data.id_showtime = element_time.value.split("-")[2]
                this.data.price_ticket = element_time.value.split("-")[3];
                this.process();
                this.resetBtn();
                this.getChar();
            })
        })
    },

    resetBtn: function() {
        this.blockChar.querySelectorAll('.btn-char').forEach((element_char) => {
            element_char.className = 'btn btn-char btnC mb-2';
            element_char.disabled = false;
        })
    },

    getChar: function () {
        // reset char
        
        // call api
        fetch(`${baseSite}api/getChair/${this.data.id_showtime}`)
            .then(res => res.json())
            .then(data => {
                const btnChar = this.blockChar.querySelectorAll('.btn-char');
                data.forEach((item_char) => {
                    for (let i = 0; i < btnChar.length; i++) {
                        if (item_char.LOCATION_TICKET == btnChar[i].value) {
                            btnChar[i].disabled = true;
                        }
                    }
                });
            });
    },
    handleChar: function () {
        document.querySelector('.chair_movie').querySelectorAll('.btn-char').forEach((element_char) => {
            element_char.addEventListener('click', () => {
                element_char.classList.toggle('act');
                this.process();
            })
        })
    },

    process: function () {
        this.blockPrice.textContent = this.data.price_ticket * document.querySelector('.chair_movie').querySelectorAll('.btn-char.act').length;
        var openCheckout = false;
        document.querySelector('.chair_movie').querySelectorAll('.btn-char').forEach((element_char) => {
            if (element_char.className == 'btn btn-char btnC mb-2 act' && this.data.price_ticket != null) {
                openCheckout = true;
            }
        })
        if (openCheckout == true) {
            document.querySelector('.block-checkout').classList.add('open');
        } else {
            document.querySelector('.block-checkout').classList.remove('open');
        }
    },
    getChairCheckOut: function() {
        let array = []
        document.querySelector('.chair_movie').querySelectorAll('.btn-char').forEach((element_char) => {
            if (element_char.className == 'btn btn-char btnC mb-2 act') {
                array.push(element_char.value);
            }
        })
        return array.join('-');
    },
    totalPrice: function() {
        let vnd = this.data.price_ticket * document.querySelector('.chair_movie').querySelectorAll('.btn-char.act').length
        let usd = vnd/22956;
        return usd.toFixed(2);
    }
}

checkout.handleChar()

const btnDay = checkout.blockDay.querySelectorAll('.btnDay')
btnDay.forEach(element_day => {
    element_day.addEventListener('click', () => {
        btnDay.forEach(item_day => {
            item_day.classList.remove('act');
        })
        element_day.classList.add('act');
        checkout.data.day_showtime = element_day.value;
        checkout.resetBtn();
        checkout.process();
        checkout.getTime();
    })
});

paypal.Button.render({
    // Configure environment
    env: 'sandbox',
    client: {
        sandbox: 'ATkc0RIsTwc1itF7oRdhr_ZXJL2y45_wzvchC4wZbnkmwPGO1tnDEn6OnmRsZFRKn_pxZ7T0khmzH2IK',
        production: 'demo_production_client_id'
    },
    // Customize button (optional)
    locale: 'en_US',
    style: {
        size: 'large',
        color: 'gold',
        shape: 'pill',
    },

    // Enable Pay Now checkout flow (optional)
    commit: true,
    // Set up a payment
    payment: function (data, actions) {
        return actions.payment.create({
            transactions: [{
                amount: {
                    total: `${checkout.totalPrice()}`,
                    currency: 'USD'
                }
            }]
        });
    },
    // Execute the payment
    onAuthorize: function (data, actions) {
        return actions.payment.execute().then(function () {
            // Show a confirmation message to the buyer
            formData = new FormData();
            formData.append('ID_SHOWTIME', checkout.data.id_showtime);
            formData.append('ID_MEMBER', document.querySelector('#idMemberCheckOut').value);
            formData.append('LOCATION_TICKET', checkout.getChairCheckOut());
            fetch(`${baseSite}api/createTicket`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                body: formData,
            }).then(res => res.json())
            .then(data => {
                if(data.message == 'success') {
                    window.alert('Mua vé thành công!');
                    window.location = `${baseSite}ve-cua-toi`;
                }
                else {
                    window.alert('Mua vé thất bại');
                }
            })
        });
    }
}, '#paypal-button');