$(document).ready(function () {

    $('#task-result').hide()
    /* renglonFactura(); */

    /* recibiendo informacion de busqueda */
    $('#search').keyup(function (e) {
        
        let search_art = $('#search').val()

        let search = search_art.toLowerCase()
     
        
       if (search) {

        $.ajax({
            url:'./includes/data.php',
            type:'POST',
            data:{search},
            success:function (response) {

               let tasks =JSON.parse(response)
               let template='';

               tasks.forEach(task => {

                // REVISAR SI EL STOCK DEL ARTICULO ES 0 O NO

                if (task.stock == 0) {
                    template += `
                <li>
                 <p>AGOTADO ${task.articulo}</p>   
                </li>
                
                `
                }else{
                   
                    template += `
                <li>
                 <p>Articulo: ${task.articulo} Stock: ${task.stock}</p> 
                 <p>Bs ${task.precio }</p>   
                </li>
                `
                }
                
                   
               });

               $('#task-result').show()

               $('#container').html(template)



                
            }
        })
           
       }

    })




/* enviando informacion a la base de dato */

$('#task-form').submit(function (e) {
    /* falta agregar cantidad */
        const postData={
            name:$('#name').val(),
            description:$('#description').val()
    
        }
         
        $.post('./includes/art-add.php',postData,function (response) {
    
         /*    renglonFactura(); */
            $('#task-form').trigger('reset')
            
        })
    
        e.preventDefault()
        
    })
    
    function renglonFactura() {
    
        $.ajax({
            url:'./includes/task-list.php',
            type:'GET',
            success:function (response) {
        
                    let tasks= JSON.parse(response)       
                    let template=''
        
                    tasks.forEach(task => {
        
                     template += `
                    <tr>
                        <td>${task.id}</td>
                        <td>${task.task}</td>
                        <td>${task.description}</td>
                    </tr>`
                        
                    });
        
                    $('#tasks').html(template)
                
            }
        })
        
    }
    

 












    
})