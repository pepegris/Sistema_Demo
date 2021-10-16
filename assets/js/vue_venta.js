

const app = new Vue({
    

    el:'#venta',

    data:{

       
   cantidad:0,
   art=20,
   total:0,
   mensaje:0,


    },

     
    computed:{

       precio:function(){
        if (this.cantidad !=0) {
            this.total += (parseFloat(this.cantidad) * parseFloat(this.art));

            
            
        this.mensaje+= this.total
            
        }
        return this.mensaje
       }

      
    }
 
   
})