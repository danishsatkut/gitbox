/*
 * Display the modal content. When the response is received display the modal content.
 *  
 **/

function deleteModal() {
        data += '';
        data += '';
    
//    if($('#myModal').length == 0) {
//        // Create only when it is not present
//        $('body').append(data);
//    }
    
    // Replace the html of the modal
    $('#myModal').html(data);
    
    // Show the modal
    $('#myModal').modal('show');
}

    