var flag_login=false;
var flag_email=false;
var flag_fio=false;
var flag_password=false;
var flag_rank=false;
function CustomValidateLogin()
{
	this.invalidities=[];
}

CustomValidateLogin.prototype=
{
	addInvalidity: function(message)
	{
		this.invalidities.push(message);
	},
	getInvalidity:function()
	{
		return (this.invalidities.join('. \n'));
	},
	checkValidity:function(input)
	{
		flag_login=true;
		if(input.value.length<3)
		{
			this.addInvalidity('Необходимо ввести 3 или более символов');
			var element=document.querySelector('div[for="login"] li:nth-child(1)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_login=false;
		}
		else
		{
			var element=document.querySelector('div[for="login"] li:nth-child(1)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}

		if(input.value.match(/[^a-zA-Z0-9]/g)||input.value.length==0)
		{
			this.addInvalidity('Логин должен содержать только буквы и цифры');
			var element=document.querySelector('div[for="login"] li:nth-child(2)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_login=false;
		}
		else
		{
			var element=document.querySelector('div[for="login"] li:nth-child(2)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}
	}
};


var loginInput=document.getElementById('login');
loginInput.CustomValidateLogin=new CustomValidateLogin();

loginInput.addEventListener('keyup',function()
{
	loginInput.CustomValidateLogin.checkValidity(this);
})


function CustomValidateEmail()
{
	this.invalidities=[];
}

CustomValidateEmail.prototype=
{
	addInvalidity: function(message)
	{
		this.invalidities.push(message);
	},
	getInvalidity:function()
	{
		return (this.invalidities.join('. \n'));
	},
	checkValidity:function(input)
	{
		flag_email=true;
		if(input.value.length<3)
		{
			this.addInvalidity('Необходимо ввести 3 или более символов');
			var element=document.querySelector('div[for="email"] li:nth-child(1)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_email=false;
		}
		else
		{
			var element=document.querySelector('div[for="email"] li:nth-child(1)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}

		if(!input.value.match(/^[\w\.\d-_]+@[\w\.\d-_]+\.\w{2,4}$/i)||input.value.length==0)
		{
			this.addInvalidity('Это должна быть почта');
			var element=document.querySelector('div[for="email"] li:nth-child(2)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_email=false;
		}
		else
		{
			var element=document.querySelector('div[for="email"] li:nth-child(2)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}
	}
};

var emailInput=document.getElementById('email');
emailInput.CustomValidateEmail=new CustomValidateEmail();

emailInput.addEventListener('keyup',function()
{
	emailInput.CustomValidateEmail.checkValidity(this);
})


function CustomValidateFIO()
{
	this.invalidities=[];
}

CustomValidateFIO.prototype=
{
	addInvalidity: function(message)
	{
		this.invalidities.push(message);
	},
	getInvalidity:function()
	{
		return (this.invalidities.join('. \n'));
	},
	checkValidity:function(input)
	{
		flag_fio=true;
		if(input.value.length<3)
		{
			this.addInvalidity('Необходимо ввести 3 или более символов');
			var element=document.querySelector('div[for="fio"] li:nth-child(1)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_fio=false;
		}
		else
		{
			var element=document.querySelector('div[for="fio"] li:nth-child(1)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}

		if(input.value.match(/[^a-zA-Z' '.]/i)||input.value.length==0)
		{
			this.addInvalidity('Имя может содержать только буквы');
			var element=document.querySelector('div[for="fio"] li:nth-child(2)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_fio=false;
		}
		else
		{
			var element=document.querySelector('div[for="fio"] li:nth-child(2)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}
	}
};

var fiolInput=document.getElementById('fio');
fiolInput.CustomValidateFIO=new CustomValidateFIO();

fiolInput.addEventListener('keyup',function()
{
	fiolInput.CustomValidateFIO.checkValidity(this);
})



function CustomValidatePassword()
{
	this.invalidities=[];
}

CustomValidatePassword.prototype=
{
	addInvalidity: function(message)
	{
		this.invalidities.push(message);
	},
	getInvalidity:function()
	{
		return (this.invalidities.join('. \n'));
	},
	checkValidity:function(input)
	{
		flag_password=true;
		if(input.value.length<5)
		{
			this.addInvalidity('Необходимо ввести 5 или более символов');
			var element=document.querySelector('div[for="password"] li:nth-child(1)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_password=false;
		}
		else
		{
			var element=document.querySelector('div[for="password"] li:nth-child(1)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}

		if(!input.value.match(/[0-9]/g)||input.value.length==0)
		{
			this.addInvalidity('Должна быть хотя бы одна цифра');
			var element=document.querySelector('div[for="password"] li:nth-child(2)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_password=false;
		}
		else
		{
			var element=document.querySelector('div[for="password"] li:nth-child(2)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}

		if(!input.value.match(/[a-z]/g)||input.value.length==0)
		{
			this.addInvalidity('Должна быть хотя бы одна цифра');
			var element=document.querySelector('div[for="password"] li:nth-child(3)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_password=false;
		}
		else
		{
			var element=document.querySelector('div[for="password"] li:nth-child(3)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}

		if(!input.value.match(/[A-Z]/g)||input.value.length==0)
		{
			this.addInvalidity('Должна быть хотя бы одна цифра');
			var element=document.querySelector('div[for="password"] li:nth-child(4)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_password=false;
		}
		else
		{
			var element=document.querySelector('div[for="password"] li:nth-child(4)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}

		if(!input.value.match(/[\!\@\#\$\%\^\&\*\_\-\№]/g)||input.value.length==0)
		{
			this.addInvalidity('Должна быть хотя бы одна цифра');
			var element=document.querySelector('div[for="password"] li:nth-child(5)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_password=false;
		}
		else
		{
			var element=document.querySelector('div[for="password"] li:nth-child(5)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}
	}
};

var passwordlInput=document.getElementById('password');
passwordlInput.CustomValidatePassword=new CustomValidatePassword();

passwordlInput.addEventListener('keyup',function()
{
	passwordlInput.CustomValidatePassword.checkValidity(this);
})


function CustomValidateRank()
{
	this.invalidities=[];
}

CustomValidateRank.prototype=
{
	addInvalidity: function(message)
	{
		this.invalidities.push(message);
	},
	getInvalidity:function()
	{
		return (this.invalidities.join('. \n'));
	},
	checkValidity:function(input)
	{
		flag_rank=true;
		if((input.value^0)!=input.value)
		{
			this.addInvalidity('Необходимо ввести целое число');
			var element=document.querySelector('div[for="rank"] li:nth-child(1)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_rank=false;
		}
		else
		{
			var element=document.querySelector('div[for="rank"] li:nth-child(1)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}

		if(input.value<0||input.value.match[/[^0-9]+/g])
		{
			this.addInvalidity('Число должно быть положительным');
			var element=document.querySelector('div[for="rank"] li:nth-child(2)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_rank=false;
		}
		else
		{
			var element=document.querySelector('div[for="rank"] li:nth-child(2)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}

		if(input.value>10||input.value.match[/[^0-9]+/g])
		{
			this.addInvalidity('Число должно быть положительным');
			var element=document.querySelector('div[for="rank"] li:nth-child(3)');
			element.classList.add('text-danger');
			element.classList.remove('text-success');
			flag_rank=false;
		}
		else
		{
			var element=document.querySelector('div[for="rank"] li:nth-child(3)');
			element.classList.remove('text-danger');
			element.classList.add('text-success');
		}
	}
};

var ranklInput=document.getElementById('rank');
ranklInput.CustomValidateRank=new CustomValidateRank();

ranklInput.addEventListener('keyup',function()
{
	ranklInput.CustomValidateRank.checkValidity(this);
})

$('form').submit(function(){
	if(flag_rank&&flag_password&&flag_fio&&flag_email&&flag_login)
	{
		alert("Форма отправлена");
		return true;
	}
	else
	{
		alert("Заполните все поля правильно");
		return false;
	}
})