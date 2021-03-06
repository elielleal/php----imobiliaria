$(document).ready(function(){
	
	<!-- VALIDA CADASTRO DE CLIENTES NO SITE -->
	$("#cadastra_cliente").validate({
						   
				rules:{
				nome:{required:true, minlength: 2},
				email:{required: true, email:true},
				senha:{required: true, minlength: 8},
				telefone:{required: true, minlength:16, maxlength:16}
				},
				
	   messages:{
	   nome:{required:"Preencha o campo nome", minlength: "Minimo 5 caracteres" },
	   email:{required: "Preencha o campo e-mail", email: "Informe um email válido"},
	   senha:{required: "Informe uma senha", minlength: "Minimo 8 caracteres"},
       telefone:{required: "Preencha o campo telefone", minlength:16, "Deve ter exatamente 16 Caracteres ex: (00) 0000-0000", maxlength: "Deve ter exatamente 16 Caracteres ex: (00) 0000-0000"}
		},						   
   });
   
   $("#site_fale_conosco").validate({
						   
				rules:{
				nome:{required:true, minlength: 5},
				email:{required: true, email:true},
				msg:{required: true, minlength: 15}
				},
				
	   messages:{
	   nome:{required:"Preencha o campo nome", minlength: "Minimo 2 caracteres" },
	   email:{required: "Preencha o campo e-mail", email: "Informe um email válido"},
	   msg:{required: "Digite sua mensagem", minlength: "Mensagem muito curta, minímo 5 caractetes"}
		},						   
   });
   
   
   $("#interesse_site").validate({
						   
				rules:{
				nome:{required:true, minlength: 5},
				email:{required: true, email:true},
				telefone:{required: true, minlength:13, maxlength:13},
				msg:{required: true, minlength: 15}
				},
				
	   messages:{
	   nome:{required:"Preencha o campo nome", minlength: "Minimo 2 caracteres" },
	   email:{required: "Preencha o campo e-mail", email: "Informe um email válido"},
	   telefone:{required: "Preencha o campo telefone", minlength: "Deve ter exatamente 13 Caracteres ex: (00)0000-0000", maxlength: "Deve ter exatamente 12 Caracteres ex: (00)0000-0000"},
	   msg:{required: "Digite sua mensagem", minlength: "Mensagem muito curta, minímo 5 caractetes"}
	  
		},						   
   });
})