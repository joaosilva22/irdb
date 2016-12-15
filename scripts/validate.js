$(document).ready(function() {

    $('#signup').validate({
	rules: {
	    firstname: 'required',
	    lastname: 'required',
	    username: {
		required: true,
		minlength: 2,
	    },
	    email: {
		required: true,
		email: true
	    },
	    password: {
		required: true,
		minlength: 6
	    },
	    confirm_password: {
		required: true,
		minlength: 6,
		equalTo: '#password'
	    }
	},
	messages: {
	    firstname: 'Please enter your first name',
	    lastname: 'Please enter your last name',
	    username: {
		required: 'Please enter a username',
		minlength: 'Your username should be at least two characters long'
	    },
	    email: {
		required: 'Please enter your email',
		email: 'Please provide a valid email'
	    },
	    password: {
		required: 'Please enter a password',
		minlength: 'Your password should be at least six characters long'
	    },
	    confirm_password: {
		required: 'Please confirm your password',
		minlength: 'Your password should be at least six characters long',
		equalTo: 'Passwords do not match'
	    }
	}
    });

    $('#signin').validate({
	rules: {
	    username: 'required',
	    password: 'required'
	},
	messages: {
	    username: 'Please enter your username',
	    password: 'Please enter your password'
	},
	submitHandler: function(form) {
	    $.ajax({
		type: 'POST',
		url: 'actions/action_login.php',
		data: {
		    username: $(form).find('#username').val(),
		    password: $(form).find('#password').val()
		},
		datatype: 'text',
		success: function(res) {
		    if (res === 'success') {
			window.location = 'index.php';
		    } else {
console.log(res);
			$('#error').html('<label class="error">Wrong username or password</label>');
		    }
		}
	    });
	    return false;
	}
    });

    $('#edit').validate({
	rules: {
	    email: {
		email: true,
	    },
	    password: {
		minlength: 6,
	    },
	    confirm_password: {
		minlength: 6,
		equalTo: '#password'
	    },
	    bio: {
		maxlength: 140
	    }
	},
	messages: {
	    email: {
		email: 'Please provide a valid email'
	    },
	    password: {
		minlength: 'Your password should be at least six characters long'
	    },
	    confirm_password: {
		minlength: 'Your password should be at least six characters long',
		equalTo: 'Passwords do not match'
	    },
	    bio: {
		maxlength: 'Your bio should have at most 140 characters'
	    }
	}
    });

    $('#add_restaurant').validate({
	rules: {
	    name: {
		required: true,
	    },
	    description: {
		required: true,
		maxlength: 500
	    },
	    image: {
		required: true
	    },
	    address: {
		required: true
	    }
	},
	messages: {
	    name: {
		required: 'Please enter your restaurant\'s name'
	    },
	    description: {
		required: 'Please enter a description of you restaurant',
		maxlength: 'The description is too long'
	    },
	    image: {
		required: 'Please provide a picture of your restaurant'
	    },
	    address: {
		required: 'Please provide the restaurant\'s address'
	    }
	},
	submitHandler: function(form) {
	    let address = $(form).find('#address').val();
	    $.ajax({
		type: 'GET',
		url: 'https://maps.googleapis.com/maps/api/geocode/json',
		data: {
		    address: address,
		    key: 'AIzaSyBogmwxTqSySp1MsW84Z81NN2jTSfnYKjE'
		},
		async: false,
		datatype: 'text',
		success: function(data) {
		    $(form).find('#lat').val(data.results[0].geometry.location.lat);
		    $(form).find('#lng').val(data.results[0].geometry.location.lng);
		}
	    });
	    return true;
	}
    });

    $('#edit_restaurant').validate({
	rules: {
	    description: {
		maxlength: 500
	    }
	},
	messages: {
	    description: {
		maxlength: 'The description is too long'
	    }
	}
    });
    
});
