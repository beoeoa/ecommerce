function closeModal() {
  jQuery('#details-modal').modal('hide');
  setTimeout(function(){
    jQuery('#details-modal').remove();
  },500);
}

jQuery(window).scroll(function() {
  var vscroll = jQuery(this).scrollTop();
  jQuery('#logotitle').css({
    "transform" : "translate(0px, "+vscroll/12+"px)"
  });
});

function detailsmodal(id) {
  var data = {"id" : id};
  jQuery.ajax({
    url : 'views/detailsModal.php',
    method : "post",
    data : data,
    success : function(data){
      jQuery('body').append(data);
      jQuery('#details-modal').modal('toggle');
      jQuery('#details-modal').modal({backdrop: 'static',  keyboard: false});
    },
    error: function(){
      alert("detailsModal could not be opened");
    }
  });
}
