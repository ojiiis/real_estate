(
   
    async ()=>{
        const forms = document.getElementsByTagName('form');
        const baseUrl = "http://localhost/fin/api";
        for(let i = 0; i < forms.length; i++){
           
            forms[i].onsubmit = async (event)=>{
                event.preventDefault();
                const data = new FormData(forms[i]);
                const body = {};
                data.forEach((item,key)=>{
                    body[key] = item;
                 
                });
              
                    const url = baseUrl+forms[i].getAttribute("action");
                 	const options = {
                    method:"POST",
                    headers:{
                        "Content-Type":"application/json"
                    },
                    body:JSON.stringify(body)
		         };
                 const req = await fetch(url,options); 
		         const res = await req.json();

                 if(!res.status){
                    var err;
                    res.data?.error.forEach((item)=>{
                        err  += `<div class="ui_kit_message_box">
		<div class="alert alart_style_four alert-dismissible fade show" role="alert">
			${item}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close" onclick="removeErrorBg(this)">
				<span aria-hidden="true">×</span>
			</button>
		</div>
	</div>`;
                    });
                    document.getElementById('error-modal-inner').innerHTML = err;
                    document.getElementById('error-modal').style.display = 'flex';
                 }else{
                    switch(res.data?.message){
                    case "Login successfull.":
                    case "Registration successfull.":
                       location = "./?auth="+res.token
                    break;
                   
                    default:
                    }
                 }
		   
            }
        }

    }
)();
    function removeErrorBg(item){
        item.parentElement.parentElement.remove()
        var visible = document.getElementById('error-modal-inner').children.length;
        if(!visible){
            document.getElementById('error-modal').style.display = 'none';
        }
    }

