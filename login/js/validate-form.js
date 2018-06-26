// Add the novalidate attribute when the JS loads
var forms = document.querySelectorAll('.validate');

// Validate the field
var hasError = function(field) {
  // Don't validate submits, buttons, file and reset inputs, and disabled fields
  if (
    field.disabled ||
    field.type === 'file' ||
    field.type === 'reset' ||
    field.type === 'submit' ||
    field.type === 'button'
  )
    return;

  // Get validity
  var validity = field.validity;

  // If valid, return null
  if (validity.valid) return;

  // If field is required and empty
  if (validity.valueMissing) return 'Please fill out this field.';

  // If not the right type
  if (validity.typeMismatch) {
    // Email
    if (field.type === 'email') return 'Please enter an email address.';

    // URL
    if (field.type === 'url') return 'Please enter a URL.';
  }

  // If too short
  if (validity.tooShort)
    return (
      'Please lengthen the password to ' +
      field.getAttribute('minLength') +
      ' characters or more. You are currently using ' +
      field.value.length +
      ' characters.'
    );

  // If pattern doesn't match
  if (validity.patternMismatch) {
    // If pattern info is included, return custom error
    if (field.hasAttribute('title')) return field.getAttribute('title');

    // Otherwise, generic error
    return 'Please match the requested format.';
  }

  // If all else fails, return a generic catchall error
  return 'The value you entered for this field is invalid.';
};

// Show an error message
var showError = function(field, error) {
  // Add error class to field
  field.classList.add('error');

  // Get field id or name
  var id = field.id || field.name;
  if (!id) return;

  // Check if error message field already exists
  // If not, create one
  var message = field.form.querySelector('.error-message#error-for-' + id);
  if (!message) {
    message = document.createElement('div');
    message.className = 'error-message';
    message.id = 'error-for-' + id;
    field.parentNode.insertBefore(message, field.nextSibling);
  }

  // Add ARIA role to the field
  field.setAttribute('aria-describedby', 'error-for-' + id);

  // Update error message
  message.innerHTML = error;

  // Show error message
  message.style.display = 'block';
  message.style.visibility = 'visible';
};

// Listen to all blur events
document.addEventListener(
  'blur',
  function(event) {
    // Only run if the field is in a form to be validated
    if (!event.target.form.classList.contains('validate')) return;

    // Validate the field
    var error = hasError(event.target);

    // If there's an error, show it
    if (error) {
      showError(event.target, error);
    }
  },
  true
);

// Check all fields on submit
document.addEventListener(
  'submit',
  function(event) {
    // Only run on forms flagged for validation
    if (!event.target.classList.contains('validate')) return;

    // Get all of the form elements
    var fields = event.target.elements;

    // Validate each field
    // Store the first field with an error to a variable so we can bring it into focus later
    var error, hasErrors;
    for (var i = 0; i < fields.length; i++) {
      error = hasError(fields[i]);
      if (error) {
        showError(fields[i], error);
        if (!hasErrors) {
          hasErrors = fields[i];
        }
      }
    }

    // If there are errrors, don't submit form and focus on first element with error
    if (hasErrors) {
      event.preventDefault();
      hasErrors.focus();
    }

    // Otherwise, let the form submit normally
    // You could also bolt in an Ajax form submit process here
  },
  false
);

$('#password').on('keyup', function() {
  var password = '';
  var password2 = '';
  password = $('#password').val();
  password2 = $('#password2').val();
  if (password !== password2) {
    var PasswordError = 'Passwords do not match';
    $('#passwordErrorContainer').css('display', 'block');
    $('#passwordError').text(`${PasswordError}`);
    
  }
});

$('#password2').on('keyup', function() {
  var password = '';
  var password2 = '';
  password = $('#password').val();
  password2 = $('#password2').val();
  if (password !== password2) {
    var PasswordError = 'Passwords do not match';
    $('#passwordErrorContainer').css('display', 'block');
    $('#passwordError').text(`${PasswordError}`);
    
  }
});

$('#password2').on('keyup', function() {
  var password = '';
  var password2 = '';
  password = $('#password').val();
  password2 = $('#password2').val();
  if (password === password2) {
    var PasswordError = 'Passwords match';
    
  }
});

$('#password').on('keyup', function() {
  var password = '';
  var password2 = '';
  password = $('#password').val();
  password2 = $('#password2').val();
  if (password === password2) {
    $('#passwordErrorContainer').css('display', 'none');
  }
});