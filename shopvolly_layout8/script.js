'use strict'

const chefstore = {}

	; ($ => {
		const $body = $('body'),
			$window = $(window)

		chefstore.init = () => {
			chefstore.topBar()
			chefstore.filterSale()
            chefstore.stickyHeader()
		}

		chefstore.topBar = () => {
            let linkTopBarLeft = $('.top-header-link a');
            linkTopBarLeft.on('click', e => {
                e.preventDefault();
            })
        }

        chefstore.filterSale = () => {
            let body = $('body'),
                filterCat = $('.wrap-filter-by-cate');

            filterCat.find('.active-1').on('click', () => {
                body.removeClass('active-2 active-3 active-4 active-5 active-6 active-7 active-8 active-9 active-0');
                body.addClass('active-1');
            })

            filterCat.find('.active-2').on('click', () => {
                body.removeClass('active-1 active-3 active-4 active-5 active-6 active-7 active-8 active-9 active-0');
                body.addClass('active-2');
            })

            filterCat.find('.active-3').on('click', () => {
                body.removeClass('active-2 active-1 active-4 active-5 active-6 active-7 active-8 active-9 active-0');
                body.addClass('active-3');
            })

            filterCat.find('.active-4').on('click', () => {
                body.removeClass('active-2 active-3 active-1 active-5 active-6 active-7 active-8 active-9 active-0');
                body.addClass('active-4');
            })

            filterCat.find('.active-5').on('click', () => {
                body.removeClass('active-2 active-3 active-4 active-1 active-6 active-7 active-8 active-9 active-0');
                body.addClass('active-5');
            })

            filterCat.find('.active-6').on('click', () => {
                body.removeClass('active-2 active-3 active-4 active-5 active-1 active-7 active-8 active-9 active-0');
                body.addClass('active-6');
            })

            filterCat.find('.active-7').on('click', () => {
                body.removeClass('active-2 active-3 active-4 active-5 active-6 active-1 active-8 active-9 active-0');
                body.addClass('active-7');
            })

            filterCat.find('.active-8').on('click', () => {
                body.removeClass('active-2 active-3 active-4 active-5 active-6 active-7 active-1 active-9 active-0');
                body.addClass('active-8');
            })

            filterCat.find('.all').on('click', () => {
                body.removeClass('active-2 active-3 active-4 active-5 active-6 active-7 active-8 active-1 active-9');
                body.addClass('active-0');
            })
        }

        chefstore.stickyHeader = () => {
            if (window.pageYOffset > 240) {
					
                $('body').addClass('active-sticky');
            }

            if ($( window ).width() > 800) {
                const header = document.querySelector('.header-sticky');

                const headroom = new Headroom(header);
                headroom.init();
            } 
        }

		$(() => {
			chefstore.init()
		})
	})(jQuery) // eslint-disable-line no-undef
