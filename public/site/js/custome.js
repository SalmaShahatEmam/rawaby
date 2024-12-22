$(".remove_mune").click(function () {
    $("#menu-div").removeClass("active");
    $(".bg_menu").removeClass("active");
  });

  function open() {
    $(".navicon").addClass("is-active");
    $("#menu-div").addClass("active");
    $("#times-ican").addClass("active");
    $(".bg_menu").addClass("active");
  }

  function close() {
    $(".navicon").removeClass("is-active");
    $("#menu-div").removeClass("active");
    $("#times-ican").removeClass("active");
    $(".bg_menu").removeClass("active");
    $(".dropdowm-language").slideUp();
    $(".dropdowm-language-mune").slideUp();
    $(".dropdowm-element").slideUp();
    $(".dropdowm-element-mune").slideUp();

    $(".remove-mune").click(function () {
      $("#menu-div").removeClass("active");
      $(".bg_menu").removeClass("active");
      $(".times-ican").removeClass("active");
    });
  }

  $("#times-ican").click(function () {
    if ($(this).hasClass("active")) {
      close();
    } else {
      open();
    }
  });

  $(".btns_menu_responsive").click(function (e) {
    close();
  });

  $(".remove-mune").click(function () {
    $("#menu-div").removeClass("active");
    $(".bg_menu").removeClass("active");
    $(".times-ican").removeClass("active");
    $(".navicon").removeClass("is-active");
  });

  $("#menu-div a").click(function () {
    e.preventDefault();
  });

  var $winl = $(window); // or $box parent container
  var $boxl = $(
    "#menu-div, #times-ican , .click-element   , .dropdowm-element-mune"
  );
  $winl.on("click.Bst", function (event) {
    if (
      $boxl.has(event.target).length === 0 && //checks if descendants of $box was clicked
      !$boxl.is(event.target) //checks if the $box itself was clicked
    ) {
      close();
    }
  });

  //
  var swiper = new Swiper(".myHeroSwiper", {
    direction: "vertical",

    // ,
    // effect: 'fade', // Change to cube, flip, etc.
    // fadeEffect: {
    //   crossFade: true, // Enables seamless fading (optional)
    // },
    // autoplay: {
    //   delay: 3000,
    //   disableOnInteraction: false,
    // },
    loop: true,
    pagination: {
      el: ".heroPagination",
      clickable: true,
      renderBullet: function (index, className) {
        return `<span class="${className}" data-index="0${index + 1}"></span>`;
      },
    },
  });

  var swiper = new Swiper(".myProductsSwiper", {
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".products-btn-next",
      prevEl: ".products-btn-prev",
    },

    breakpoints: {
      0: {
        navigation:false,
        slidesPerView: 1,
        spaceBetween: 20,
      },
      552: {
        navigation:false,
        slidesPerView: 2,
        spaceBetween: 20,
      },
      768: {
        navigation:false,
        slidesPerView: 2,
        spaceBetween: 40,
      },
      1024: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
    },
  });

  var swiper = new Swiper(".myServicesSwiper", {
    autoHeight: true,
    slidesPerView: 1,
    spaceBetween: 10,
    loop: true,
    autoplay: {
      delay: 3000,
      disableOnInteraction: false,
    },
    navigation: {
      nextEl: ".Services-btn-next",
      prevEl: ".Services-btn-prev",
    },
    breakpoints: {
      0:{
        navigation:false,
        slidesPerView: 1,
        spaceBetween: 20,
      },
      552:{
        navigation:false,
        slidesPerView: 2,
        spaceBetween: 20,
      },
      762:{
        navigation:false,
        slidesPerView: 2,
        spaceBetween: 20,
      },
      992: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
      1100: {
        slidesPerView: 3,
        spaceBetween: 40,
      },
    },
  });


  let swiperWrapper = document.querySelector(".myPartnersSwiper .swiper-wrapper");
  let slides = Array.from(
    document.querySelectorAll(".myPartnersSwiper .swiper-slide")
  );
  let requiredSlides = 5; // Match your slidesPerView

  if(swiperWrapper){
    if (slides.length < requiredSlides) {
      let duplicateCount = requiredSlides - slides.length;
      for (let i = 0; i < duplicateCount; i++) {
        let clone = slides[i % slides.length].cloneNode(true);
        swiperWrapper.appendChild(clone);
      }
    }
  }
  var swiper = new Swiper(".myPartnersSwiper", {
    slidesPerView: 5.5,
    spaceBetween: 20,
    loop: true,
    freeMode: true, // Enables smooth continuous scrolling
    freeModeMomentum: false, // Removes "inertia" at the end of swiping
    autoplay: {
      delay: 0, // No delay, constant movement
      disableOnInteraction: false,

    },
    speed: 7000, // Slower for smooth continuous movement
    breakpoints: {
      0:{
        slidesPerView: 2,
        spaceBetween: 10,
      },
      450:{
        slidesPerView: 3,
        spaceBetween: 10,
      },
      768: {
        slidesPerView: 4,
        spaceBetween: 10,
      },
      1024: {
        slidesPerView: 6,
        spaceBetween: 20,
      },
    },
  });

  $(document).ready(function () {
    $(".owl-carousel").owlCarousel({
      items: 1,
      loop: true,
      stagePadding: 250,
      margin: 10,
      responsive: true,
      rtl:true,
      autoplay: true,
      autoplayTimeout: 2000,
      nav: true,
      dots: false,
      navText: [
        '<img src="/site/images/arrow-left.svg">', // Font Awesome for prev
        '<img src="/site/images/arrow-right.svg">', // Font Awesome for next
      ],
      autoplayHoverPause: true,
      responsive: {
        0: {
          stagePadding: 1,
          nav : false,
          items: 1,

        },
        600: {
          items: 1,
          stagePadding: 50,
          nav : false,

        },
         1024: {
          items: 1,
          stagePadding: 150,

        },
        1200: {
          items: 1,
          stagePadding: 220,

        },
      },
    });
  });


  // contact form select
  const masterSelect = document.querySelector(".contact-page .master select");
  const mainSelect = document.querySelector(".contact-page .main select");
  if(masterSelect){

    masterSelect.addEventListener("change", function () {
      if (masterSelect.value !== "") {
        // Enable the main dropdown
        mainSelect.classList.remove("disabled-dropdown");
        mainSelect.classList.add("enabled-dropdown");
      } else {
        // Disable the main dropdown
        mainSelect.classList.remove("enabled-dropdown");
        mainSelect.classList.add("disabled-dropdown");
        mainSelect.selectedIndex = 0; // Reset the selection
      }
    });
  }

  // i want after chose file from id=file-input make the file name appear in the .file-label p
  const fileInput = document.getElementById("file-input");
  const fileLabel = document.querySelector(".file-label ");
  const fileName = document.querySelector(".file-label p");
  const deleteIcon = document.querySelector(".delete-icon");

 if(fileInput)
 {
    fileInput.addEventListener("change", function () {
        const selectedFile = fileInput.files[0];
        if (selectedFile) {
          const fileExtension = selectedFile.name.split(".").pop().toLowerCase();
          const allowedExtensions = ["pdf", "docx"];
          if (allowedExtensions.includes(fileExtension)) {
            fileName.textContent = selectedFile.name;
            fileLabel.classList.add("chossen");
            deleteIcon.style.display =  "block";
          } else {
            fileInput.value = "";
            fileName.textContent = "يرجى تحميل ملف PDF أو DOCX فقط.";
            fileLabel.classList.remove("chossen");
            deleteIcon.style.display =  "none";
          }

        } else {
        }
      });
 }


  // after choose file i need on clcick on delete icon delete the file name and make the file input empty
  deleteIcon.addEventListener("click", function () {
    fileInput.value = "";
    fileName.textContent = "قم بإسقاط أوتحميل ملف (PDF أو DOCX)";
    fileLabel.classList.remove("chossen");
    deleteIcon.style.display =  "none";
  });
