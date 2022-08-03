	stickyHeader();
	mobileMenu();

	function stickyHeader(){
		const header = document.querySelector("#header");
		const scrollUp = "sticky";
		const scrollDown = "sticky-up";
		let lastScroll = 0;

		window.addEventListener("scroll", () => {
			const currentScroll = window.pageYOffset;
			if (currentScroll <= 200) {
				header.classList.remove(scrollUp);
				header.classList.remove(scrollDown);
				return;
			}

			if (currentScroll > lastScroll && !header.classList.contains(scrollDown)) {
				// down
				header.classList.remove(scrollUp);
				header.classList.add(scrollDown);
			} else if (currentScroll < lastScroll && header.classList.contains(scrollDown)) {
				// up
				header.classList.remove(scrollDown);
				header.classList.add(scrollUp);
			}
			lastScroll = currentScroll;
		});
	}

	function mobileMenu(){
		let el = document.querySelectorAll('.menu-toggle');
		for (var i = 0; i < el.length; i++) {
			el[i].addEventListener('click',function(){
				document.querySelector('.main-navigation').classList.toggle('active');
				document.querySelector('.menu-open').classList.toggle('active');
				document.querySelector('.menu-bg').classList.toggle('active');
			});
		}
	}