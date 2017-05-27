//Error - Noty
function createNoty(type,position,message,time) {
    new Noty({
        type: type,
        layout: position,
        theme: 'relax',
        text: message,
        timeout: time,
        progressBar: true,
        closeWith: ['click', 'button'],
        animation: {
            open: 'noty_effects_open',
            close: 'noty_effects_close'
        }
    }).show()
}