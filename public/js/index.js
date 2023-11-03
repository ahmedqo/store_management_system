// s = `<div class="bg-green-500 bg-red-500"></div>`
function Slider(els, opts = {}) {
    var position,
        action = 0;

    function Instance() {
        this.actions = {};
        this.wrap = typeof els.wrap === "string" ? document.querySelector(els.wrap) : els.wrap;
        this.list = this.wrap.querySelector("ul");
        this.wrap.style.touchAction = "none";
        this.wrap.style.overflow = "hidden";
        this.list.style.display = "flex";
        this.wrap.style.direction = "ltr";
        this.list.style.direction = "ltr";
        this.current = {
            value: 0,
        };

        this.change = (fn) => {
            this.actions.change = fn;
        };

        this.update = (opt = {}) => {
            const options = {
                ...opts,
                ...opt,
            };
            this.infinite = options.infinite || false;
            this.vert = options.vert || false;
            this.auto = options.auto || false;
            this.size = options.size || false;
            this.flip = options.flip || false;
            this.touch = options.touch || false;
            this.time = options.time || 5000;
            this.move = options.move || 1;
            this.cols = options.cols || 1;
            this.gap = options.gap || 0;

            if (this.infinite) {
                [...this.list.children].map((e) => e.isCloned && e.remove());

                const len = this.list.children.length;
                const firsts = [...this.list.children].reduce((a, e, i) => {
                    if (i < this.cols) {
                        const x = e.cloneNode(true);
                        x.setAttribute("x-clone", "");
                        a.push(x);
                    }
                    return a;
                }, []);
                const lasts = [...this.list.children].reduce((a, e, i) => {
                    if (i > len - this.cols - 1) {
                        const x = e.cloneNode(true);
                        x.setAttribute("x-clone", "");
                        a.push(x);
                    }
                    return a;
                }, []);

                if (firsts.length) {
                    for (let i = 0; i < this.cols; i++) {
                        const current = firsts[i];
                        this.list.insertAdjacentElement("beforeend", current);
                        current.isCloned = true;
                    }
                }

                if (lasts.length)
                    for (let i = this.cols; i > 0; i--) {
                        const current = lasts[i - 1];
                        this.list.insertAdjacentElement("afterbegin", current);
                        current.isCloned = true;
                    }
            }

            this.items = [...this.list.children];
            this.length = this.items.length;

            this.__opt = this.vert ?
                {
                    size: "clientHeight",
                    item: "height",
                    scroll: "scrollTop",
                    pos: "clientY",
                } :
                {
                    size: "clientWidth",
                    item: "width",
                    scroll: "scrollLeft",
                    pos: "clientX",
                };

            this.size ?
                (this.wrap.style[this.__opt.item] = this.size * this.cols + this.gap * (this.cols - 1) + "px") :
                (this.wrap.style[this.__opt.item] = "100%");

            this.list.style.width = "";
            this.list.style.flexDirection = "";
            this.list.style.width = "";
            this.list.style.height = "";

            this.vert ?
                (this.list.style.width = "100%") && (this.list.style.flexDirection = "column") :
                (this.list.style.width = "max-content") && (this.list.style.height = "100%");

            this.itemSize = this.wrap[this.__opt.size] / this.cols - (this.gap * (this.cols - 1)) / this.cols;
            this.scrollLength = this.itemSize + this.gap;
            this.list.style.gap = this.gap + "px";

            for (let i = 0; i < this.length; i++) {
                this.items[i].style[this.__opt.item] = this.itemSize + "px";
            }

            if (!this.__isLunched && this.current.value === 0) {
                this.current.value = this.cols * this.move;
                window.onresize = this.update;
                this.__isLunched = true;
            }

            this.wrap.style.scrollBehavior = "unset";
            this.wrap[this.__opt.scroll] = this.scrollLength * this.current.value;
            this.wrap.style.scrollBehavior = "smooth";

            this.scrollAuto();
            this.scrollTouch();
        };

        this.resize = (fn_true = () => {}, fn_false = () => {}, condistion = "(min-width: 1024px)") => {
            const fn = () => {
                if (window.matchMedia(condistion).matches) fn_true(this);
                else fn_false(this);
            };
            window.addEventListener("resize", fn);
            fn();
        };

        this.scroll = () => {
            this.wrap[this.__opt.scroll] = this.scrollLength * this.current.value;
            this.actions.change && this.actions.change(this);
        };

        this.scrollTo = (idx) => {
            this.current.value = idx;
            this.scroll();
        };

        this.scrollNext = () => {
            this.scrollAuto();
            if (this.current.value >= this.length - this.cols) {
                if (this.infinite) {
                    this.wrap.style.scrollBehavior = "unset";
                    this.current.value = this.cols;
                    this.scroll();
                    this.current.value += this.move;
                    this.wrap.style.scrollBehavior = "smooth";
                } else this.current.value = 0;
            } else this.current.value += this.move;
            this.scroll();
        };

        this.scrollPrev = () => {
            this.scrollAuto();
            if (this.current.value <= 0) {
                if (this.infinite) {
                    this.wrap.style.scrollBehavior = "unset";
                    this.current.value = this.length - this.cols - this.cols;
                    this.scroll();
                    this.current.value -= this.move;
                    this.wrap.style.scrollBehavior = "smooth";
                } else this.current.value = this.length - this.cols;
            } else this.current.value -= this.move;
            this.scroll();
        };

        this.scrollAuto = () => {
            if (this.auto) {
                const repeatOften = () => {
                    clearTimeout(this.__timer);
                    this.__timer = setTimeout(() => {
                        this.flip ? this.scrollPrev() : this.scrollNext();
                        requestAnimationFrame(repeatOften);
                    }, this.time);
                };
                requestAnimationFrame(repeatOften);
            } else {
                clearTimeout(this.__timer);
            }
        };

        this.scrollTouch = () => {
            if (this.touch) {
                var fn;
                this.wrap.onpointerdown = (e) => {
                    e.preventDefault();
                    if (action === 0) {
                        action = 1;
                        position = e[this.__opt.pos];
                    }

                    const handleMove = (e) => {
                        e.preventDefault();
                        fn = e[this.__opt.pos] >= position ? this.scrollPrev : this.scrollNext;
                        if (action === 1) {
                            action = 2;
                        }
                    };

                    const handleUp = (e) => {
                        e.preventDefault();
                        fn && fn();
                        if (action === 2) action = 0;
                        this.wrap.onpointermove = null;
                        this.wrap.onpointerup = null;
                    };

                    this.wrap.onpointermove = handleMove;
                    this.wrap.onpointerup = handleUp;
                };
            } else {
                this.wrap.onpointerdown = null;
            }
        };

        if (els.prev) {
            this.prev = typeof els.prev === "string" ? document.querySelector(els.prev) : els.prev;
            this.prev.onclick = this.scrollPrev;
        }

        if (els.next) {
            this.next = typeof els.next === "string" ? document.querySelector(els.next) : els.next;
            this.next.onclick = this.scrollNext;
        }

        this.update();
    }

    return new Instance();
}

function Counter(selector) {
    document.querySelectorAll(selector).forEach((qte) => {
        const sub = qte.querySelector('[counter="-"]');
        const inp = qte.querySelector('[counter="x"]');
        const add = qte.querySelector('[counter="+"]');

        sub.addEventListener("click", (e) => {
            e.preventDefault();
            const num = +inp.value || 2;
            inp.value = num > 1 ? num - 1 : 1;
        });

        inp.addEventListener("input", (e) => {
            e.preventDefault();
            const num = +inp.value || 1;
            inp.value = num;
        });

        add.addEventListener("click", (e) => {
            e.preventDefault();
            const num = +inp.value || 0;
            inp.value = num + 1;
        });
    });
}

function CreateRows(data, target, lang) {
    const _target = document.querySelector(target);
    JSON.parse(localStorage[data]).forEach((row) => {
        _target.innerHTML += `
            <div class="w-full flex flex-wrap gap-4 items-center">
                <button data-idx="${row.id}"
                    class="remove -me-2 w-6 h-6 flex items-center justify-center text-red-500 outline-none hover:text-red-300 focus:text-red-300">
                    <svg class="block w-6 h-6 pointer-events-none" fill="currentcolor" viewBox="0 -960 960 960">
                        <path
                            d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                    </svg>
                </button>
                <a href="${
					row.link
				}" class="h-full w-20 aspect-square bg-x-white shadow-x-core rounded-md row-span-2 overflow-hidden border border-x-black-blur">
                    <img src="${row.img}" class="w-full h-full object-cover" />
                </a>
                <div class="w-0 flex-1 gap-2 flex flex-col justify-center">
                    <h2 class="text-md font-semibold lg:text-xl text-x-black w-full truncate">
                        ${row["title_" + lang]}
                    </h2>
                    <div class="w-full flex gap-2 items-center">
                        <div class="counter flex flex-wrap w-max gap-1 items-center">
                            <button counter="-"
                                class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-x-prime text-x-prime text-lg font-black outline-none hover:border-x-acent hover:text-x-acent focus:border-x-acent focus:text-x-acent">
                                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M225-434q-20.75 0-33.375-13.36Q179-460.719 179-479.86q0-20.14 12.625-32.64T225-525h511q19.775 0 32.888 12.675Q782-499.649 782-479.509q0 19.141-13.112 32.325Q755.775-434 736-434H225Z" />
                                </svg>
                            </button>
                            <input type="hidden" name="product[]" value="${row.id}" />
                            <input counter="x" type="number" name="quantity[]" value="${row.qte || 1}"
                                class="w-20 text-center bg-transparent text-x-black font-black p-1 text-md rounded-md focus-within:outline-x-prime focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
                            <button counter="+"
                                class="w-6 h-6 flex items-center justify-center rounded-full border-2 border-x-prime text-x-prime text-lg font-black outline-none hover:border-x-acent hover:text-x-acent focus:border-x-acent focus:text-x-acent">
                                <svg class="block w-5 h-5 pointer-events-none" fill="currentcolor"
                                    viewBox="0 -960 960 960">
                                    <path
                                        d="M479.825-185q-18.45 0-31.637-12.625Q435-210.25 435-231v-203H230q-18.375 0-31.688-13.56Q185-461.119 185-479.86q0-20.14 13.312-32.64Q211.625-525 230-525h205v-205q0-19.775 13.358-32.388Q461.716-775 480.158-775t32.142 12.612Q526-749.775 526-730v205h204q18.8 0 32.4 12.675 13.6 12.676 13.6 32.316 0 19.641-13.6 32.825Q748.8-434 730-434H526v203q0 20.75-13.65 33.375Q498.699-185 479.825-185Z" />
                                </svg>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        `;
    });
}

function RemoveRows(data) {
    document.querySelectorAll(".remove").forEach((row) => {
        row.addEventListener("click", (e) => {
            e.preventDefault();
            const rows = JSON.parse(localStorage[data]).filter((_) => _.id !== +e.target.dataset.idx);
            localStorage.setItem(data, JSON.stringify(rows));
            e.target.parentElement.remove();
            if (!rows.length) location.reload();
        });
    });
}

function format(num) {
    return Intl.NumberFormat().format(num, { currency: "" }).trim();
}

function QuotationRow(data, idx = false) {
    const tr = document.createElement("tr");
    const quantity = document.createElement("input");
    const price = document.createElement("input");
    quantity.className = price.className =
        "w-[80px] text-center bg-transparent text-x-black focus-within:outline-x-prime p-1 text-sm rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2";
    tr.className = "border-x-shade border-t";

    quantity.name = "quantity[]";
    quantity.type = "number";
    quantity.value = data.quantity || 1;

    price.value = data.price;
    price.name = "price[]";
    price.type = "number";

    tr.innerHTML = `
        <td class="text-x-black text-sm font-x-core p-2">
            <div class="w-max mx-auto font-x-core text-sm">${document.querySelector("tbody").children.length + 1}</div>
            <input type="hidden" name="product[]" value="${data.idx}" />   
        </td>
        <td class="text-x-black text-sm p-2">
            ${data.name}    
        </td>
        <td class="text-x-black text-sm p-2 w-[80px]">
            <input type="text" name="unit[]" value="${data.unit}"
                class="w-[80px] text-center bg-transparent text-x-black focus-within:outline-x-prime p-1 text-base rounded-md focus-within:outline focus-within:outline-2 focus-within:-outline-offset-2" />
        </td>
        <td class="text-x-black text-sm p-2 w-[80px]"></td>
        <td class="text-x-black text-sm p-2 w-[80px]"></td>
        <td class="lot text-x-black text-base text-center font-x-core p-2 w-[80px]">
            ${format(data.price * +quantity.value)}    
        </td>
        <td class="text-x-black text-sm p-2 w-[80px]">
            <button type="button"
                class="mx-auto p-2 flex items-center justify-center rounded-md text-[#fcfcfc] hover:text-[#1d1d1d] focus-within:text-[#1d1d1d] bg-red-400 hover:bg-red-300 focus-within:bg-red-300 outline-none">
                <svg class="block w-4 h-4 pointer-events-none" fill="currentcolor"
                    viewBox="0 -960 960 960">
                    <path
                        d="M253-99q-36.462 0-64.231-26.775Q161-152.55 161-190v-552h-11q-18.75 0-31.375-12.86Q106-767.719 106-787.36 106-807 118.613-820q12.612-13 31.387-13h182q0-20 13.125-33.5T378-880h204q19.625 0 33.312 13.75Q629-852.5 629-833h179.921q20.279 0 33.179 13.375 12.9 13.376 12.9 32.116 0 20.141-12.9 32.825Q829.2-742 809-742h-11v552q0 37.45-27.069 64.225Q743.863-99 706-99H253Zm104-205q0 14.1 11.051 25.05 11.051 10.95 25.3 10.95t25.949-10.95Q431-289.9 431-304v-324q0-14.525-11.843-26.262Q407.313-666 392.632-666q-14.257 0-24.944 11.738Q357-642.525 357-628v324Zm173 0q0 14.1 11.551 25.05 11.551 10.95 25.8 10.95t25.949-10.95Q605-289.9 605-304v-324q0-14.525-11.545-26.262Q581.91-666 566.93-666q-14.555 0-25.742 11.738Q530-642.525 530-628v324Z" />
                </svg>
            </button>
        </td>
    `;

    const button = tr.querySelector("button");
    const lot = tr.querySelector(".lot");

    quantity.addEventListener("change", (e) => {
        quantity.value = +quantity.value || 1;
    });

    quantity.addEventListener("input", (e) => {
        lot.innerHTML = format((+quantity.value || 1) * +price.value || 0);
        QuotationRow.Total();
    });

    price.addEventListener("input", (e) => {
        lot.innerHTML = format(+quantity.value * +price.value || 0);
        QuotationRow.Total();
    });

    button.addEventListener("click", (e) => {
        tr.remove();
        QuotationRow.Total();
        if (idx) document.querySelector("#form").insertAdjacentHTML("beforeend", `<input type="hidden" name="delete[]" value="${idx}" />`);
    });

    tr.children[3].appendChild(quantity);
    tr.children[4].appendChild(price);

    return tr;
}

QuotationRow.Total = function() {
    document.querySelector("#subtotal").innerHTML = format([...document.querySelectorAll(".lot")].reduce((s, e) => s + +e.innerHTML.replace(/,/g, ""), 0));
    document.querySelector("#charges").innerHTML =
        ((+document.querySelector("#charge").value || 0) / 100) * +document.querySelector("#subtotal").innerHTML.replace(/,/g, "");
    document.querySelector("#total").innerHTML = format(+document.querySelector("#subtotal").innerHTML.replace(/,/g, "") + +document.querySelector("#charges").innerHTML);
};