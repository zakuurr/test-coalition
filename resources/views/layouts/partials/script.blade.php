<script src="{{ asset('') }}assets/libs/jquery/dist/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="{{ asset('') }}assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="{{ asset('') }}assets/js/sidebarmenu.js"></script>
  <script src="{{ asset('') }}assets/js/app.min.js"></script>
  <script src="{{ asset('') }}assets/libs/apexcharts/dist/apexcharts.min.js"></script>
  <script src="{{ asset('') }}assets/libs/simplebar/dist/simplebar.js"></script>
  <script src="{{ asset('') }}assets/js/dashboard.js"></script>
  <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

  @include('sweetalert::alert')
  <script type="text/javascript">
    $(function () {
      $("#table").DataTable({
        ordering:false
      });

      $( "#tablecontents" ).sortable({
        items: "tr",
        cursor: 'move',
        opacity: 0.6,
        update: function() {
            sendOrderToServer();
        }
      });

      function sendOrderToServer() {
        var order = [];
        var token = $('meta[name="csrf-token"]').attr('content');
        $('tr.row1').each(function(index,element) {
          order.push({
            id: $(this).attr('data-id'),
            position: index+1
          });
        });

        $.ajax({
          type: "POST",
          dataType: "json",
          url: "{{ route('tasks.reorder') }}",
              data: {
            order: order,
            _token:  "{{ csrf_token() }}"
          },
          success: function(response) {
              if (response.status == "success") {
                // Use SweetAlert to display a success message
                console.log('asdasd');
                Swal.fire({
                            icon: 'success',
                            title: 'Hore!',
                            text: 'Reorder Update Successfully',
                        });
                        console.log('asdasd');
              } else {
                // Use SweetAlert to display an error message
                console.log('asdasd');
                Swal.fire({
                            icon: 'error',
                            title: 'Ups',
                            text: 'Reorder Update Failed',
                        });
                    }
                    console.log('asdasd');
          }
        });
      }
    });
  </script>

<script>
    $(document).ready(function() {
        $("#project").on("change", function() {
            let dataTask = $(this).find("option:selected").data("tasks");

            let tbody = $("#taskTable tbody");

            if (dataTask.length > 0) {
                tbody.empty();

                dataTask.forEach(element => {
                    // Create a new row and cells
                    console.log(element);
                    let row = $("<tr></tr>");
                    let nameCell = $("<td></td>").text(element.name);
                    let priorityCell = $("<td></td>").text(element.priority);
                     // Check if 'element.project' exists before accessing its 'name' property

                    let editCell = $("<td></td>").html(`<a href='tasks/edit/${element.id}' class="btn btn-warning"><span><i class="ti ti-edit"></i></span></a> | <form action="/tasks/delete/${element.id}" class="d-inline" method="POST">
                                @csrf
                                @method("DELETE")
                                <button type="submit" class="btn btn-danger"><span><i class="ti ti-trash"></i></span></button>
                            </form>`);

                    // Append cells to the row
                    row.append(nameCell, priorityCell, editCell);

                    // Append the row to the table body
                    tbody.append(row);
                });
            }
        })
    });
</script>



