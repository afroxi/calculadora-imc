const pesoInput = document.querySelector('#peso');
const alturaInput = document.querySelector('#altura');
const btnForm = document.querySelector('button[type="submit"]');

iniciarApp();

function iniciarApp()
{
	document.addEventListener('DOMContentLoaded', () => {
		btnForm.disabled = true;
	})

	pesoInput.addEventListener('blur', validarCampo);
	alturaInput.addEventListener('blur', validarCampo);
}

function validarCampo(evt)
{
	if (evt.target.value === '' || evt.target.value <= 0 || isNaN(evt.target.value)) {
		evt.target.style.borderBottom = '1px solid red';
	} else {
		evt.target.style.borderBottom = 'none';
	}
	validarCampos();
}

function validarCampos()
{
	if (pesoInput.value !== '' && alturaInput.value !== '' && pesoInput.value > 0 && alturaInput.value > 0) {
		btnForm.disabled = false;
	} else {
		btnForm.disabled = true;
	}
}