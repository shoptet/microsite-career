$(function(){
  var handleChange = function() {
    var location = $('#job-list-filter-location').val();
    var department = $('#job-list-filter-department').val();
    var $list, $item, emptyList, emptyAll = true;
    
    $('[data-job-list]').each(function() {
      $list = $(this);
      emptyList = true;
      $list.children('[data-job-item]').each(function() {
        $item = $(this);
        if (location && $item.attr('data-job-item-location') != location) {
          $item.hide();
        } else {
          $item.show();
          emptyList = false
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

  $('#job-list-filter-location, #job-list-filter-department').on('change', handleChange);
});