// // code to prevent dropdown from closing on click inside STARTS
// $(document).on('click', '.dd-user .dropdown-menu', function (e) { e.stopPropagation(); });
// $(document).on('click', '.dd-notification .dropdown-menu', function (e) { e.stopPropagation(); });
// // code to prevent dropdown from closing on click inside ENDS
//
// // code to delay display of modal by 100 millisecond STARTS
// $('[data-toggle=modal]').on('click', function (e) {
//     var $target = $($(this).data('target'));
//     $target.data('triggered',true);
//     setTimeout(function() {
//         if ($target.data('triggered')) {
//             $target.modal('show')
//                 .data('triggered',false); // prevents multiple clicks from reopening
//         };
//     }, 100); // milliseconds
//     return false;
// });
// // code to delay display of modal by 300 millisecond ENDS
//
// // code to display First Letter of Name In Header STARTS
// $(document).ready(function(){
//   $('.image_text').text($('#userName').text().charAt(0));
// });
// // code to display First Letter of Name In Header ENDS
//
// // code to display tooltip STARTS
// $(function(){$('[data-toggle="tooltip"]').tooltip()});
// // code to display tooltip ENDS
