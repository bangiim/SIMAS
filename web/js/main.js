$(function(){
 //ambil form untuk tambah data
 $("#modalButton").click(function(){
     $("#modal").modal('show')
             .find("#modalContent")
             .load($(this).attr('value'));
 });
});