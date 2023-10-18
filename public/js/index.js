// s = `<div class="bg-green-500 bg-red-500"></div>`
function Slider(els, opts = {}) {
    var position,
        action = 0;

    function Instance() {
        this.actions = {};
        this.wrap = typeof els.wrap === "string" ? document.querySelector(els.wrap) : els.wrap;
        this.list = this.wrap.querySelector("ul");
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

        add.addEventListener("click", (e) => {
            e.preventDefault();
            const num = +inp.value || 0;
            inp.value = num + 1;
        });
    });
}