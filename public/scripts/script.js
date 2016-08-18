$('document').ready(function()
{
	setInterval(function()
	{
		$('.chat_box').load('index.php?page=chat_item&ajax');
	}, 1000);
	$('.send').submit(function(info)
	{
		info.preventDefault();
		var content = $('#send').val();
		var scroll = $('.chat_box').scrollTop();
		$.post('index.php?page=home', {"form":"send","content":content}, function()
		{
			$('#send').val('').focus();
		});
		return false;
	});
	$('.chat_box').hover(function(){$('.focus').focus()});

	$('.contact button').click(function(info)
	{
		info.preventDefault();
		var name = $('#name').val();
		$('#name+.error').remove();
		if (name.length < 2)
			$('#name').after('<div class="error">Nom trop court (au moins deux caractères)</div>');
		if (name.length > 63)
			$('#name').after('<div class="error">Nom trop long (maximum 63 caractères)</div>');
		var email = $('#email').val();
		var tel = $('#tel').val();
		$('#tel+.error').remove();
		if (tel.length !=0 && /^0[1-9]([-. ]?[0-9]{2}){4}$/.test(tel) == false)
			$('#tel').after('<div class="error">Numéro de téléphone incorrect</div>');
		var society = $('#society').val();
		$('#society+.error').remove();
		if (society.length != 0 && society.length < 2)
			$('#society').after('<div class="error">Nom de société trop court (au moins deux caractères)</div>');
		if (society.length > 127)
			$('#society').after('<div class="error">Nom de société trop long (maximum 127 caractères)</div>');
		var title = $('#title').val();
		$('#title+.error').remove();
		if (title.length < 3)
			$('#title').after('<div class="error">Titre trop court (au moins trois caractères)</div>');
		if (title.length > 127)
			$('#title').after('<div class="error">Titre trop long (maximum 127 caractères)</div>');
		var content = $('#content').val();
		$('#content+.error').remove();
		if (content.length < 10)
			$('#content').after('<div class="error">Message trop court (au moins 10 caractères)</div>');
		if (content.length > 2047)
			$('#content').after('<div class="error">Message trop long (maximum 2047 caractères)</div>');
		if ($('.contact_item>.error').length == 0)
			$('.contact').trigger('submit');
	});
});