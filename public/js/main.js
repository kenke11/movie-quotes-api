let newQuoteBtn = document.querySelector('.add_new_quote_btn'),
    quoteForm = document.querySelector('.quote_form');

quoteForm.style.marginTop = '-355px'
quoteForm.style.transition = '1s'

newQuoteBtn.addEventListener('click', () => {
    quoteForm.style.display = 'block'
    setTimeout(() => {
        quoteForm.style.marginTop = ''
        setTimeout(() => {
            quoteForm.style.opacity = '1'
        })
    }, 100)

})
