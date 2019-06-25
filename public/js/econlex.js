
function validarAcesso() {
	var aceso = document.acesso;

	
	if (aceso.area.value.length == 0) {
                swal("Atenção", "O campo Área não foi preenchido!", "warning");
		//alert('O campo [ �rea ] n�o foi preenchido.');
		aceso.area.focus();
		return false;
	}
	
	if (aceso.login.value.length == 0) {
                swal("Atenção", "O campo Login não foi preenchido!", "warning");
		//alert('O campo [ Login ] n�o foi preenchido.');
		aceso.login.focus();
		return false;
	}
	
	if (aceso.senha.value.length == 0) {
                swal("Atenção", "O campo Senha não foi preenchido!", "warning");
		//alert('O campo [ Senha ] n�o foi preenchido.');
		aceso.senha.focus();
		return false;
	}
}