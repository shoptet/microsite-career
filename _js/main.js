
var handleJobFilteringChange = function() {
  var location = $('#job-list-filter-location').val();
  var department = $('#job-list-filter-department').val();
  var $list, $item, emptyList, emptyAll = true;

  var searchParams = new URLSearchParams(window.location.search);
  searchParams.delete('location');
  if (location) {
    searchParams.set('location', location);
  }
  searchParams.delete('department');
  if (department) {
    searchParams.set('department', department);
  }
  newRelativePathQuery = window.location.pathname;
  if (searchParams.toString()) {
    newRelativePathQuery += '?' + searchParams.toString();
  }
  history.pushState(null, '', newRelativePathQuery + '#open-positions');
  
  $('[data-job-list]').each(function() {
    $list = $(this);
    emptyList = true;
    $list.children('[data-job-item]').each(function() {
      $item = $(this);
      if (location && $item.attr('data-job-item-location') != location) {
        $item.hide();
      } else {
        $item.show();
        emptyList = false;
      }
    });
    if (emptyList || (department && $list.attr('data-job-list-department') != department)) {
      $list.hide();
    } else {
      $list.show();
      emptyAll = false;
    }
  });

  if (emptyAll) {
    $('[data-job-message]').html('<p class="my-3">😿 Nebyla nalezena žádná pozice s&nbsp;těmito požadavky</p>');
  } else {
    $('[data-job-message]').html('');
  }
};

var handleJobFilteringTaxClick = function (e) {
  e.preventDefault();
  var $this = $(this);
  var tax = $this.attr('data-job-filter-tax');
  var term = $this.attr('data-job-filter-term');
  $('#job-list-filter-' + tax).val(term).change();
  $('html, body').animate({
    scrollTop: $('#open-positions').offset().top,
  }, 500);
};

var initJobFiltering = function () {
  $('#job-list-filter-location, #job-list-filter-department').on('change', handleJobFilteringChange);
  $('[data-job-filter-tax]').on('click', handleJobFilteringTaxClick);

  var searchParams = new Proxy(new URLSearchParams(window.location.search), {
    get: function(searchParams, prop) {
      return searchParams.get(prop);
    },
  });
  if (searchParams.location) {
    $('#job-list-filter-location').val(searchParams.location).change();
  }
  if (searchParams.department) {
    $('#job-list-filter-department').val(searchParams.department).change();
  }
};

$(function(){

  initJobFiltering();

  var images = document.querySelectorAll('.parallax');
  new simpleParallax(images, {
    scale: 1.5,
    customWrapper: '.parallax-wrapper',
  });

  if (document.querySelector('.splide.full')) {
    var splideFull = new Splide('.splide.full', {
      gap: '1rem',
    });
    splideFull.mount();
  }
  
  if (document.querySelector('.splide.blog')) {
    var splideBlog = new Splide('.splide.blog', {
      perPage: 3,
      gap: '1rem',
      pagination: false,
      perMove: 1,
      breakpoints: {
        1199: {
          perPage: 2,
        },
        767: {
          perPage: 1,
        },
      }
    });
    splideBlog.mount();
  }

  if (document.querySelector('#gallery-slider') && document.querySelector('#gallery-thumbnail-slider')) {
    var main = new Splide('#gallery-slider', {
      rewind: true,
      lazyLoad: 'nearby',
      preloadPages: 2,
    });

    var thumbnails = new Splide('#gallery-thumbnail-slider', {
      fixedWidth: 100,
      fixedHeight: 100,
      gap: '0.5rem',
      pagination: false,
      cover: true,
      isNavigation: true,
      focus: 'center',
      type: 'loop',
      arrows: false,
      breakpoints : {
        767: {
          fixedWidth: 60,
          fixedHeight: 60,
        },
      },
    });
    
    main.sync(thumbnails);
    main.mount();
    thumbnails.mount();
  }

});