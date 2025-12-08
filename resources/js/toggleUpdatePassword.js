const passwordFields = [
    { 
        inputId: 'update_password_current_password', 
        toggleId: 'toggleCurrentPassword', 
        hideIconId: 'iconHideCurrentPassword', 
        showIconId: 'iconShowCurrentPassword' 
    },
    { 
        inputId: 'update_password_password', 
        toggleId: 'toggleNewPassword', 
        hideIconId: 'iconHideNewPassword', 
        showIconId: 'iconShowNewPassword' 
    },
    { 
        inputId: 'update_password_password_confirmation', 
        toggleId: 'toggleConfirmPassword', 
        hideIconId: 'iconHideConfirmPassword', 
        showIconId: 'iconShowConfirmPassword' 
    }
];

passwordFields.forEach(field => {
    const input = document.getElementById(field.inputId);
    const toggle = document.getElementById(field.toggleId);
    const hideIcon = document.getElementById(field.hideIconId);
    const showIcon = document.getElementById(field.showIconId);

    if (toggle && input) {
        toggle.addEventListener('click', (e) => {
            e.preventDefault();
            const hidden = input.type === 'password';
            input.type = hidden ? 'text' : 'password';

            if (hidden) {
                hideIcon.classList.add('hidden');
                showIcon.classList.remove('hidden');
            } else {
                hideIcon.classList.remove('hidden');
                showIcon.classList.add('hidden');
            }
        });
    }
});
