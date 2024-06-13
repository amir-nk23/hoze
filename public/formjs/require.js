
document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById('required_form');
    var requiredFields = form.querySelectorAll('[required]');

    requiredFields.forEach(function(field) {
        var span = document.createElement('span');
        span.className = 'required-marker';
        span.textContent = ' *';
        span.style.color = 'red';
        span.style.float='left';
        field.parentNode.insertBefore(span, field.nextSibling);
    });
});
