(function ($) {
	if (window.location.href.indexOf("&fbclid") > -1) {
		let new_url = window.location.href.split("&fb");
		window.location.replace(new_url[0]);
	}

	$(document).ready(function () {
		// Dostosowanie wysokości produktów
		function productHeight() {
			//Normalize to each other
			let hg = 0;
			$(".product").each(function (index) {
				if ($(this).height() > hg) {
					hg = $(this).height();
				}
			});
			$(".product").css("min-height", hg);
		}
		if ($(window).width() > 500 && $(".product").length > 0) {
			productHeight();
		}

		function productReadMore() {
			$(".dodatkowy-opis p").click(function () {
				$(this).siblings().slideDown(200);
				$(this).find(".product__read-more").hide();
				if ($(window).width() > 500) {
					setTimeout(function () {
						productHeight();
					}, 300);
				}
			});
		}
		if ($(".product").length > 0) {
			productReadMore();
		}

		// Otwieranie kalendarium
		function kalnedariumToggle() {
			$(".close-kalendarium").click(function () {
				$("#kalendarium-box").fadeOut(500);
			});

			$(".open-kalendarium").click(function () {
				$("#kalendarium-box").fadeIn(500);
			});
		}
		kalnedariumToggle();

		if ($("html").attr("lang") === "en-GB") {
			//Ceny w euro
			function EuroPrice() {
				setInterval(function () {
					$(".woocommerce-Price-amount bdi").each(function () {
						if ($(this).text().indexOf("€") === -1) {
							let text = $(this).text();
							let number = text.match(/\d+/);
							let price = Math.ceil(number[0] / 4.59, 2);

							let final = price + " €";

							$(this).text(final);
						}
					});
				}, 500);
			}
			EuroPrice();
		}

		//CENA WARIANTÓW
		function variationPriceDisplay() {
			function swapPrice() {
				$(".product").each(function () {
					let variationPrice = $(this)
						.find(".woocommerce-variation-price .price")
						.html();
					let regularPrice = $(this).find(".price").first();
					const words = regularPrice.text().split(" ");

					regularPrice.text(words[0]);
					regularPrice.html(variationPrice);
				});
			}
			let variationInterval = setInterval(swapPrice, 500);
		}
		if ($(".product").length > 0) {
			variationPriceDisplay();
		}

		// 'Zamów' zamiast 'Dodaj do koszyka'
		function addToCartChangeText() {
			$(".add_to_cart_button").text("Zamów");
		}
		addToCartChangeText();

		// Podkreślenie produktu VIP
		function productVIP() {
			$(".product").each(function () {
				let title = $(this).find(".woocommerce-loop-product__title").text();
				if (title.indexOf("VIP") > 0) {
					$(this).addClass("productVIP");
				}
			});
		}
		if ($(".product").length > 0) {
			productVIP();
		}

		// IMG OBRAZKÓW W PRÓBKACH + OBEJSCIE ZABEZPIECZENIA PRZED POBIERANIEM NEXTGEN GALLERY
		function galleryCaptionIMG() {
			setInterval(function () {
				if ($(".galleria-image").length > 0) {
					if ($(".galleria-image").eq(0).css("z-index") == 1) {
						let url = $(".galleria-image").eq(0).find("img").prop("currentSrc");
						let filename = url.split("/");

						$(".galleria-info-description").html(filename[filename.length - 1]);
						$(".galleria-info-description").css("display", "block");
					} else {
						let url = $(".galleria-image").eq(1).find("img").prop("currentSrc");
						let filename = url.split("/");

						$(".galleria-info-description").html(filename[filename.length - 1]);
						$(".galleria-info-description").css("display", "block");
					}
				}
			}, 300);
		}
		if (window.location.pathname.indexOf("probki") != -1) {
			galleryCaptionIMG();
		}

		//Wyszukiwarka reportaży
		function imagesSearch_reportages() {
			let input = $(".images-search input");
			let searchText = input.val().toLowerCase();
			let searchWords = searchText.split(" ");

			for (i = searchWords.length; i > 0; i--) {
				if (searchWords[i] == "") {
					searchWords.pop();
				}
			}

			let images = $(".image_container");

			let resultsFound = $(".images-search__results-found");
			let resultsNumber = $(".box:visible").length;
			let resultsNotFound = $(".images-search__not-found");

			if (searchText.length > 0) {
				$(images).each(function () {
					let caption = $(this).find(".caption_link").text().toLowerCase();
					let caption_words = caption.split("_");

					for (j = 0; j < searchWords.length; j++) {
						for (i = 0; i < caption_words.length; i++) {
							if (caption_words[i].indexOf(searchWords[j]) == -1) {
								visibility = false;
							} else {
								visibility = true;
								break;
							}
						}
					}

					if (visibility == true) {
						$(this).fadeIn();
					} else {
						$(this).fadeOut();
					}
				});
				if (resultsNumber == 0) {
					$(resultsFound).hide();
					$(resultsNotFound).css("display", "block").fadeIn();
				} else {
					$(resultsFound).find("span").text(resultsNumber);
					$(resultsFound).fadeIn();
					$(resultsNotFound).hide();
				}
			} else {
				images.fadeIn(500);
				$(resultsFound).fadeOut();
			}
		}
		//setInterval(imagesSearch_reportages, 300);

		//Wyszukiwarka próbek
		function imagesSearch_samples() {
			let input = $(".images-search input");
			let searchText = input.val().toLowerCase();
			let searchWords = searchText.split(" ");

			for (i = searchWords.length; i > 0; i--) {
				if (searchWords[i] == "") {
					searchWords.pop();
				}
			}

			let images = $(".box");

			let resultsFound = $(".images-search__results-found");
			let resultsNumber = $(".box:visible").length;
			let resultsNotFound = $(".images-search__not-found");

			if (searchText.length > 0) {
				$(images).each(function () {
					let caption = $(this).find(".titleName").text().toLowerCase();
					let caption_words = caption.split("_");

					for (j = 0; j < searchWords.length; j++) {
						for (i = 0; i < caption_words.length; i++) {
							if (caption_words[i].indexOf(searchWords[j]) == -1) {
								visibility = false;
							} else {
								visibility = true;
								break;
							}
						}
					}

					if (visibility == true) {
						$(this).fadeIn();
					} else {
						$(this).fadeOut();
					}
				});
				if (resultsNumber == 0) {
					$(resultsFound).hide();
					$(resultsNotFound).css("display", "block").fadeIn();
				} else {
					$(resultsFound).find("span").text(resultsNumber);
					$(resultsFound).fadeIn();
					$(resultsNotFound).hide();
				}
			} else {
				images.fadeIn(500);
				$(resultsFound).fadeOut();
			}
		}
		//setInterval(imagesSearch_samples, 300);

		// Slider z ostatnimi postami
		function recentPostsSlider() {
			$(".recent-posts").slick({
				dots: false,
				infinite: true,
				autoplay: true,
				fade: false,
				arrows: false,
				speed: 1500,
				autoplaySpeed: 3000,
				useCSS: true,
				slide: "li",
				slidesToShow: 3,
				pauseOnHover: false,
				slidesToScroll: 1,
				initialSlide: 1,
				responsive: [
					{
						breakpoint: 500,
						settings: {
							slidesToShow: 1,
							centerMode: true,
							slidesToScroll: 1,
						},
					},
				],
			});
		}
		if (".recent-posts".length > 0) {
			recentPostsSlider();
		}
	});
})(jQuery);
