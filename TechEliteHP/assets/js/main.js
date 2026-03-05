(() => {
    window.addEventListener('DOMContentLoaded', () => {
        const planSelect = document.querySelector('#selectplan');
        if (!planSelect) return;

        const plan = localStorage.getItem('selectedPlan');
        if (!plan) return;

        planSelect.value = plan;
        localStorage.removeItem('selectedPlan');
    });
    ////////////////////////////
    //1.ハンバーガーメニュー
    ////////////////////////////
    const $hamburger = document.querySelector('.header .hamburger');
    const $headerMenu = document.querySelector('.header .menu');

    if ($hamburger && $headerMenu) {
        $hamburger.addEventListener('click', () => {
            $hamburger.classList.toggle('active');
            $headerMenu.classList.toggle('active');
        })
    }

    ////////////////////////////
    //2.プランルーム選択とformセレクトのリンク
    //3.roomタブ切り替え
    //4.ページ内リンク
    ////////////////////////////
    function smoothScroll(target) {
        target?.scrollIntoView({
            behavior: 'smooth',
            block: 'start'
        });
    }
    document.addEventListener('click', (e) => {
        //2.プランルーム選択とformセレクトのリンク
        const planBtn = e.target.closest('.plan .reserve-btn');
        if (planBtn) {
            e.preventDefault();

            const plan = planBtn.dataset.plan || '';
            const url = planBtn.href;

            localStorage.setItem('selectedPlan', plan);

            location.href = url;
            return;
        }
        //同一ページ内用
        // const planBtn = e.target.closest('.plan .reserve-btn');
        // if (planBtn) {
        //     e.preventDefault();

        //     const plan = planBtn.dataset.plan;
        //     const planSelect = document.querySelector('#selectplan');
        //     const reservation = document.querySelector('#reservation');

        //     if (!plan || !planSelect || !reservation) return;

        //     planSelect.value = plan;
        //     smoothScroll(reservation);
        //     return;
        // }

        //3.roomタブ切り替え
        const roomLi = e.target.closest('.room .detail .item li');
        if (roomLi) {
            e.preventDefault();

            const itemList = roomLi.parentElement;
            const selections = document.querySelectorAll('.room .detail .selection');
            const items = [...itemList.children];
            const index = items.indexOf(roomLi);

            items.forEach(el => el.classList.remove('active'));
            selections.forEach(el => el.classList.remove('active'));

            roomLi.classList.add('active');
            selections[index]?.classList.add('active');
            return;
        }
        //4.ページ内リンク
        const link = e.target.closest('a[href*="#"]');
        if (!link) return;
        if (link.closest('.room .detail .item')) return;
        const hash = link.hash;

        if (hash === '#') {
            e.preventDefault();
            window.scrollTo({ top: 0, behavior: 'smooth' });
            return;
        }
        if (link.pathname !== location.pathname) return;

        const target = document.querySelector(hash);
        if (!target) return;

        e.preventDefault();
        $hamburger?.classList.remove('active');
        $headerMenu?.classList.remove('active');

        smoothScroll(target);
    });

    

    ////////////////////////////
    //5.seasonのカルーセル実装 
    ////////////////////////////
    const $carousel = document.querySelector('.season .carousel');
    const $originalItems = [...document.querySelectorAll('.season .carousel .carousel-item')];
    const $count = $originalItems.length;

    if ($carousel && $originalItems.length) {
        let items = [];
        let currentIndex = 0;
        let isAnimating = false;
        let isPaused = false;
        let minClone;
        let baseIndex;

        function getGap() {
            const style = window.getComputedStyle($originalItems[0]);
            return parseInt(style.marginRight) + parseInt(style.marginLeft);
        }
        function getSlideWidth() {
            return getGap() + $originalItems[0].clientWidth;
        }
        function getInitialData() {
            let needCount = Math.ceil(window.innerWidth / getSlideWidth());

            minClone = Math.ceil(needCount / $count) * 5;
            baseIndex = minClone;
        }

        getInitialData();

        function createClones() {
            $carousel.innerHTML = "";
            items = [];

            for (let i = 0; i < minClone; i++) {
                const clone = $originalItems[i % $count].cloneNode(true);
                clone.classList.add('clone');
                $carousel.appendChild(clone);
                items.push(clone);
            }

            $originalItems.forEach(item => {
                $carousel.appendChild(item);
                items.push(item);
            })

            for (let i = 0; i < minClone ; i++) {
                const clone = $originalItems[i % $count].cloneNode(true);
                clone.classList.add('clone');
                $carousel.appendChild(clone);
                items.push(clone);
            }
        }

        createClones();

        function setInitialPosition() {
            $carousel.style.transition = 'none';
            const x = - (baseIndex * getSlideWidth());
            $carousel.style.transform = `translateX(${x}px)`;
            currentIndex = 0
        }

        setInitialPosition();

        function moveToSlide(index) {
            if (isAnimating || isPaused) return;
            isAnimating = true;

            const target = baseIndex + index;
            const x = -(target * getSlideWidth());
            $carousel.style.transition = "transform 1s ease";
            $carousel.style.transform = `translateX(${x}px)`;
            currentIndex = index;
        }

        $carousel.addEventListener("transitionend", (e) => {
            if (e.propertyName !== "transform") return;

            const count = $originalItems.length;
            $carousel.style.transition = "none";

            if (currentIndex >= count) {
                currentIndex = 0;

                $carousel.style.transform = `translateX(${-(baseIndex * getSlideWidth())}px)`;
            }
            if (currentIndex < 0) {
                currentIndex = count - 1;
                $carousel.style.transform = `translateX(${-(baseIndex + currentIndex) * getSlideWidth()}px)`;
            }

            isAnimating = false;
        });

        // setInterval(() => {
        //     if (isAnimating || isPaused) return;
        //     moveToSlide(currentIndex + 1);
        // }, 1000);

        function autoPlay() {
            if (!isPaused && !isAnimating) {
                moveToSlide(currentIndex + 1);
            }
            setTimeout(autoPlay, 1500);
        }

        autoPlay();

        window.addEventListener("resize", () => {
            getInitialData();
            createClones();
            setInitialPosition();

            isPaused = true;
            isAnimating = false;

            $carousel.style.transition = "none";

            const x = -(baseIndex + currentIndex) * getSlideWidth();
            $carousel.style.transform = `translateX(${x}px)`;

            requestAnimationFrame(() => {
                $carousel.style.transition = "transform 1s ease";
            });

            clearTimeout(window.resizeTimeout);
            window.resizeTimeout = setTimeout(() => {
                isPaused = false;
            }, 1000);
        });
    }

    ////////////////////////////
    //6.formのvalidation
    ////////////////////////////
    ///////////////////
    //6-1.配列
    ///////////////////
    const rules = [
        {
            name: 'fullname',
            end: '入力してください'
        },
        {
            name: 'email',
            end: '入力してください',
            alt: 'メール形式で入力してください'
        },
        {
            name: 'tel',
            in: '半角数字で入力してください',
            end: '10〜11桁で入力してください'
        },
        {
            name: 'postal',
            in: '半角数字で入力してください',
            end: '7桁で入力してください'
        },
        {
            name: 'prefecture',
            end: '入力してください'
        },
        {
            name: 'city',
            end: '入力してください'
        },
        {
            name: 'street',
            end: '入力してください'
        },
        {
            name: 'checkin',
            end: '選択してください'
        },
        {
            name: 'checkout',
            in: 'チェックインから30日以内で選択してください',
            end: '選択してください'
        },
        {
            name: 'selectplan',
            end: '選択してください'
        },
        {
            name: 'adults',
            end: '選択してください'
        },
        {
            name: 'children',
            end: '選択してください'
        },
        {
            name: 'message',
            in: '1000字以内で入力してください'
        },
        {
            name: 'submit',
            end: '必須入力項目を確認してください'
        }
    ];
    function FormValidation() {
        const $form = document.querySelector('#reserveForm');
        if (!$form) return;
        let isAfterSubmit = false;

        ///////////////////
        //6 エラー表示関数
        ///////////////////
        function setErr(ask, type) {
            const rule = rules.find(r => r.name === ask);
            if (!rule || !rule[type]) return;

            const el = $form.querySelector(`.error[data-form="${ask}"]`);
            if (!el) return;

            el.textContent = rule[type];
            el.style.display = 'block';
        }
        function clearErr(ask) {
            const el = $form.querySelector(`.error[data-form="${ask}"]`);
            if (!el) return;

            el.textContent = '';
            el.style.display = 'none';
        }
        ///////////////////
        //6-1.名前、都道府県、市区町村、番地
        ///////////////////
        function validateRequired() {
            let error = false;
            ['fullname', 'prefecture', 'city', 'street'].forEach(item => {
                const el = $form.querySelector(`#${item}`);
                if (!el || el.value.trim() === '') {
                    setErr(item, 'end');
                    error = true;
                } else {
                    clearErr(item);
                }
            });
            return error;
        }
        function blindValidateRequired() {
            ['fullname', 'prefecture', 'city', 'street'].forEach(item => {
                const el = $form.querySelector(`#${item}`);
                if (!el) return;

                el.addEventListener('input', () => {
                    if (!isAfterSubmit) return;

                    const isEmpty = el.value.trim() === '';
                    if (isEmpty) {
                        setErr(item, 'end');
                    } else {
                        clearErr(item);
                    }
                    validateSubmit();
                });
            });
        }
        blindValidateRequired();
        ///////////////////
        //6-2.email
        ///////////////////
        function invalidEmailFormat(value) {
            return !/^[^\s@]+@[^\s@]+$/.test(value);
        }
        function normalizeEmail(value) {
            return value.replace(/＠/g, '@').trim();
        }
        function getEmailErrorType(value) {
            if (value === '') return 'end';
            if (invalidEmailFormat(value)) return 'alt';
            return null;
        }
        function validateEmail() {
            const $email = $form.querySelector('#email');
            if (!$email) return false;

            const filtered = normalizeEmail($email.value);
            const errType = getEmailErrorType(filtered);

            if (errType) {
                setErr('email', errType);
                return true;
            }

            clearErr('email');
            return false;
        }
        function blindValidateEmail() {
            const $email = $form.querySelector('#email');
            if (!$email) return;

            $email.addEventListener('input', () => {
                if (!isAfterSubmit) return;

                const filtered = normalizeEmail($email.value);
                const errType = getEmailErrorType(filtered);

                if (errType) {
                    setErr('email', errType);
                } else {
                    clearErr('email');
                }
                validateSubmit();
            });
        }
        blindValidateEmail();
        ///////////////////
        //6-3.tel
        ///////////////////
        function validTelFormat(value) {
            return /^\d{10,11}$/.test(value);
        }
        function normalizeTel(value) {      
            return value.replace(/[^0-9]/g, '').slice(0,11);
        }
        function validateTel() {
            const $tel = $form.querySelector('#tel');
            if (!$tel) return false;

            const filtered = normalizeTel($tel.value);

            if (!validTelFormat(filtered)) {
                setErr('tel', 'end');
                return true;
            }

            clearErr('tel');
            return false;
        }
        function blindValidateTel() {
            const $tel = $form.querySelector('#tel');
            if (!$tel) return;
            
            $tel.addEventListener('input', () => {
                const origin = $tel.value;
                const filtered = normalizeTel(origin);

                $tel.value = filtered;

                if (/\D/.test(origin)) {
                    setErr('tel', 'in');
                } else if (validTelFormat(filtered)) {
                    clearErr('tel');
                } else if (isAfterSubmit) {
                    setErr('tel', 'end');
                } else {
                    clearErr('tel');
                }

                validateSubmit();
            });
        }
        blindValidateTel();
        ///////////////////
        //6-4.郵便番号
        ///////////////////
        function normalizePostal(value) {
            return value.replace(/\D/g, '').slice(0, 7);
        }
        function formatPostal(value) {
            return value.length <= 3
                ? value
                : `${value.slice(0, 3)}-${value.slice(3)}`;
        }
        function validatePostal() {
            const $postal = $form.querySelector('#postal');
            if (!$postal) return false;

            const filtered = normalizePostal($postal.value);

            if (filtered.length !== 7) {
                setErr('postal', 'end');
                return true;
            }

            clearErr('postal');
            return false;
        }
        function blindValidatePostal() {
            const $postal = $form.querySelector('#postal');
            if (!$postal) return;

            $postal.addEventListener('input', () => {
                const origin = $postal.value;
                const filtered = normalizePostal(origin);

                $postal.value = formatPostal(filtered);

                if (/[^0-9-]/.test(origin)) {
                    setErr('postal', 'in');
                } else if (filtered.length === 7) {
                    clearErr('postal');
                } else if (isAfterSubmit) {
                    setErr('postal', 'end');
                } else {
                    clearErr('postal');
                }
                validateSubmit();
            });    
        }
        blindValidatePostal();
        ///////////////////
        //6-5-1.カレンダー flatpickr制御
        //・checkinは今日以降１年以内
        //・checkoutは今日以降1年1ヶ月以内
        //・checkinとcheckoutの間隔は30日以内
        //・checkinが入力済みの場合チェックアウト日はチェックインから30日以内
        //・checkoutが入力済みの場合チェックイン日は制限無し、30日以外ならcheckoutをデフォルトに戻す
        ///////////////////
        const $checkin  = $form.querySelector('#checkin');
        const $checkout = $form.querySelector('#checkout');

        function addDays(date, days) {
            const d = new Date(date);
            d.setDate(d.getDate() + days);
            return d;
        }
        function addMonths(date, months) {
            const d = new Date(date);
            d.setMonth(d.getMonth() + months);
            return d;
        }
        function addYears(date, years) {
            const d = new Date(date);
            d.setFullYear(d.getFullYear() + years);
            return d;
        }
        function checkinRange() {
            const today = new Date();
            return {
                min: today,
                max: addYears(today, 1),
            };
        }
        function checkoutRangeWithoutCheckin() {
            const today = new Date();
            return {
                min: today,
                max: addMonths(addYears(today, 1), 1),
            };
        }
        function checkoutRangewithCheckin(checkinDate) {
            return {
                min: checkinDate,
                max: addDays(checkinDate, 30),
            };
        }
        let checkinPicker = null;
        let checkoutPicker = null;

        if ($checkin && $checkout) {
            const checkoutInit = checkoutRangeWithoutCheckin();

            checkoutPicker = flatpickr($checkout, {
                locale: 'ja',
                dateFormat: 'Y年n月j日',
                monthSelectorType: "static",
                disableMobile: true,
                minDate: checkoutInit.min,
                maxDate: checkoutInit.max,
                position: "auto center",

                onOpen: () => {
                    const d = checkoutPicker.selectedDates?.[0] ?? new Date();
                    checkoutPicker.jumpToDate(d, true);
                },
            });

            const checkinInit = checkinRange();

            checkinPicker = flatpickr($checkin, {
                locale: 'ja',
                dateFormat: 'Y年n月j日',
                monthSelectorType: "static",
                disableMobile: true,
                minDate: checkinInit.min,
                maxDate: checkinInit.max,
                position: "auto center",

                onOpen: () => {
                    const d = checkinPicker.selectedDates?.[0] ?? new Date();
                    checkinPicker.jumpToDate(d, true);
                },

                onChange: (selectedDates) => {
                    if (!selectedDates.length) return;

                    const newCheckin = selectedDates[0];

                    const currentCheckout = checkoutPicker.selectedDates?.[0] ?? null;

                    if (currentCheckout) {
                        const diffDays = Math.round((currentCheckout - newCheckin) / 86400000);

                        if (diffDays >= 0 && diffDays <= 30) {
                        } else {
                            checkoutPicker.clear();
                        }
                    }

                    const range = checkoutRangewithCheckin(newCheckin);
                    checkoutPicker.set('minDate', range.min);
                    checkoutPicker.set('maxDate', range.max);

                    const afterCheckout = checkoutPicker.selectedDates?.[0] ?? null;
                    if (afterCheckout && (afterCheckout < range.min || afterCheckout > range.max)) {
                        checkoutPicker.clear();
                    }
                },
            });
            $checkout.addEventListener('focus', () => {
                if (!checkinPicker.selectedDates?.length) {
                    const r = checkoutRangeWithoutCheckin();
                    checkoutPicker.set('minDate', r.min);
                    checkoutPicker.set('maxDate', r.max);
                    return;
                }

                const checkinDate = checkinPicker.selectedDates[0];
                const r = checkoutRangewithCheckin(checkinDate);
                checkoutPicker.set('minDate', r.min);
                checkoutPicker.set('maxDate', r.max);
            });
        }
        ///////////////////
        //6-5-2.カレンダー validateチェック
        ///////////////////
        function validateCheckinCalendar() {
            if(!$checkin) return false;

            let error = false;

            if ($checkin.value === '') {
                setErr('checkin', 'end');
                error = true;
            } else {
                clearErr('checkin');
            }
            return error;
        }
        function validateCheckoutCalendar() {
            if(!$checkout) return false;

            let error = false;

            if ($checkout.value === '') {
                setErr('checkout', 'end');
                error = true;
            } else {
                clearErr('checkout');
            }
            return error;
        }
        function blindValidateCheckin() {
            if(!$checkin) return;

            $checkin.addEventListener('change', () => {
                if (!isAfterSubmit) return;

                if ($checkin.value === '') {
                    setErr('checkin', 'end');
                } else {
                    clearErr('checkin');
                }
                validateSubmit();
            });
        }
        blindValidateCheckin();
        function blindValidateCheckout() {
            if(!$checkout) return;

            $checkout.addEventListener('change', () => {

                    if ($checkout.value === '') {
                        setErr('checkout', 'in');
                    } else {
                        clearErr('checkout');
                    }
                
                validateSubmit();
            });
        }
        blindValidateCheckout();
        ///////////////////
        //6-6.セレクトチェック
        ///////////////////
        function validateSelect() {
            let error = false;
            ['selectplan', 'adults', 'children'].forEach(item => {
                const el = $form.querySelector(`#${item}`);
                if (!el || el.value === '') {
                    setErr(item, 'end');
                    error = true;
                } else {
                    clearErr(item);
                }
            });
            return error;
        }
        function blindValidateSelect() {
            ['selectplan', 'adults', 'children'].forEach(item => {
                const el = $form.querySelector(`#${item}`);
                if (!el) return;

                el.addEventListener('change', () => {
                    if (!isAfterSubmit) return;

                    if (el.value === '') {
                        setErr(item, 'end');
                    } else {
                        clearErr(item);
                    }
                    validateSubmit();
                });
            });
        }
        blindValidateSelect();
        ///////////////////
        //6-7.message
        ///////////////////
        function blindValidateMessage() {
            const $message = $form.querySelector('#message');
            if (!$message) return;

            $message.addEventListener('input', () => {

                if ($message.value.length > 1000) {
                    setErr('message', 'in'); 
                } else {
                    clearErr('message');
                }
            });
        }
        blindValidateMessage();
        ///////////////////
        //6-8.Submit
        ///////////////////
        function validateSubmit() {
            if (!isAfterSubmit) return;

            const isRequiredError = [...$form.querySelectorAll('.error')]
                .some(el =>
                    el.dataset.form !== 'submit' &&
                    getComputedStyle(el).display !== 'none'
                );
            if (isRequiredError) {
                setErr('submit', 'end');
            } else {
                clearErr('submit');
            }
        }
        $form.addEventListener('submit', e => {
            isAfterSubmit = true;

            let error = false;

            if (validateRequired()) error = true;
            if (validateEmail()) error = true;
            if (validateTel()) error = true;
            if (validatePostal()) error = true;
            if (validateCheckinCalendar()) error = true;
            if (validateCheckoutCalendar()) error = true;
            if (validateSelect()) error = true;

            validateSubmit();

            if (error) {
                e.preventDefault();
            }
        });
    }
    FormValidation();

})();