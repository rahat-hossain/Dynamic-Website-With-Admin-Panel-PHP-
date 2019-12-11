 <!-- jQuery first, then Popper.js, then Bootstrap JS -->
 <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
     integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
 </script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"
     integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
 </script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
     integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
 </script>
 <script type="text/javascript" src="../js/jquery.dataTables.min.js"></script>
 <script type="text/javascript" src="../js/dataTables.bootstrap4.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/sweetalert2@8"></script>


 <script type="text/javascript">
    $(document).ready(function() {
    $('#user_list').DataTable( {
        "lengthMenu": [[5, 10, 50, -1], [5, 10, 50, "All"]]
    } );
// aikhane "banner_delete_button" ta holo delete button ar class
    $('.banner_delete_button').click(function(){
        var banner_id = $(this).val();//val function aikhane value anbe id ar
        var link_to_go = "delete_banner.php?banner_id="+banner_id;//delete file a pathanor link

        Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
        if (result.value) {
            window.location.href=link_to_go;
        }
        })
    });

} );
 </script>

</body>

 </html>