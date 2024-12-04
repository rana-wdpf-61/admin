

<div class="container">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">name</th>
                <th scope="col">action</th>

            </tr>
        </thead>
        <tbody id="data-append">


        </tbody>
    </table>
</div>

<script>
    $(function() {


        $.ajax({
            url: "<?php echo $base_url ?>/api/division",
            type: "get",
            data: {},
            success: function(res) {
                let data = JSON.parse(res);
                data = data.divisions

                let html = "";
                data.forEach(element => {
                    // console.log(element);
                    html += `
                <tr>
                <th scope="row">${element.id}</th>
                <td>${element.name}</td>
                <td>
                <a class="btn btn-primary edit" data-id="${element.id}">Edit</a>
                <a class="btn btn-danger delete" data-id="${element.id}">Delete</a>
                </td>
                </tr>
            `;
                    $("#data-append").html(html);

                });
            },
            error: function(error) {

            }
        });


        $("body").on("click",".edit", function() {
            let id = $(this).data("id");
            console.log(id);
            window.location = `<?php echo $base_url ?>/division/edit?id=${id}`;
        })


        $("body").on("click",".delete", function() {
            let id = $(this).data("id");
            console.log(id);

         $.ajax({
         url: "<?php echo $base_url ?>/api/division/delete",
         type:"post",
         data: {id:id},
         success: function(res) {
         console.log(res);
         location.reload()
         },
         error: function(res) {}
         })  

           
        })


        // $.ajax({
        //     url: "",
        //     type: "get",
        //     data: {},
        //     success: function(res) {
        //         console.log(res);
                
        //     },
        //     error: function(res) {}
        // })

    })
</script>

