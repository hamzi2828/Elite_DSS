$(document).ready(function () {
  $(".minus").click(function () {
    var $input = $(this).parent().find("input");
    var count = parseInt($input.val()) - 1;
    count = count < 1 ? 1 : count;
    $input.val(count);
    $input.change();
    return false;
  });
  $(".plus").click(function () {
    var $input = $(this).parent().find("input");
    $input.val(parseInt($input.val()) + 1);
    $input.change();
    return false;
  });
});

// product card slider js
$(document).ready(function () {
  if ($(".bbb_viewed_slider").length) {
    var viewedSlider = $(".bbb_viewed_slider");

    viewedSlider.owlCarousel({
      loop: true,
      stagePadding: 10,
      center: true,
      //   items: 3,
      margin: 20,
      autoplay: false,
      autoplayTimeout: 6000,
      nav: false,
      dots: false,

      responsive: {
        0: { items: 1 },
        575: { items: 2 },
        768: { items: 3 },
        991: { items: 3 },
        1199: { items: 3 },
      },
    });

    if ($(".bbb_viewed_prev").length) {
      var prev = $(".bbb_viewed_prev");
      prev.on("click", function () {
        viewedSlider.trigger("prev.owl.carousel");
      });
    }

    if ($(".bbb_viewed_next").length) {
      var next = $(".bbb_viewed_next");
      next.on("click", function () {
        viewedSlider.trigger("next.owl.carousel");
      });
    }
  }
});

// input tele js

// var input = document.querySelector("#phone");
// window.intlTelInput(input, {
//   // allowDropdown: false,
  // autoHideDialCode: false,
  // autoPlaceholder: "off",
  // dropdownContainer: document.body,
  // excludeCountries: ["us"],
  // formatOnDisplay: false,
  // geoIpLookup: function(callback) {
  //   $.get("http://ipinfo.io", function() {}, "jsonp").always(function(resp) {
  //     var countryCode = (resp && resp.country) ? resp.country : "";
  //     callback(countryCode);
  //   });
  // },
  // hiddenInput: "full_number",
//   initialCountry: "pk",
  // localizedCountries: { 'de': 'Deutschland' },
  // nationalMode: true,
//   onlyCountries: ['pk'],
//   placeholderNumberType: "MOBILE",
  // preferredCountries: ['cn', 'jp'],
//   separateDialCode: true,
//   utilsScript: "build/js/utils.js",
//});

// hide and show js
function hideShow() {
  var x = document.getElementById("chatbot");
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}

// read more button
function showmore() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}

function showmoree() {
  var dots = document.getElementById("dotss");
  var moreText = document.getElementById("moree");
  var btnText = document.getElementById("myBtn1");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
function showmoreee() {
  var dots = document.getElementById("dotsss");
  var moreText = document.getElementById("moreee");
  var btnText = document.getElementById("myBtn2");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}
function showmoreeee() {
  var dots = document.getElementById("dotssss");
  var moreText = document.getElementById("moreeee");
  var btnText = document.getElementById("myBtn3");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more";
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less";
    moreText.style.display = "inline";
  }
}

// checkbox only one at a time
function onlyOne(checkbox) {
  var checkboxes = document.getElementsByName("check");
  checkboxes.forEach((item) => {
    // console.log(checkbox);
    if (item !== checkbox) item.checked = false;
  });
}


// google map
// function myMap() {
//   var location = { lat: 24.860735, lng: 67.001137 };

//   var map = new google.maps.Map(document.getElementById("map"), {
//     zoom:4,
//     center:location,
//   });
// }


