import { request } from './utils.js'

class ContactsController {
    constructor() {
        this.send_contacts_form = document.querySelector("#send-contacts")
        if (this.send_contacts_form) {
            this.send_contacts_form.addEventListener("submit", this.send_contacts.bind(this))
            this.send_contacts_button = this.send_contacts_form.querySelector("button[type='submit']")
            this.setup_validation()
        }
    }

    setup_validation() {
        const fields = this.send_contacts_form.querySelectorAll('input:not([type="submit"])')
        fields.forEach(input => {
            input.addEventListener('blur', () => this.validate_field(input))
            input.addEventListener('input', () => {
                if (input.classList.contains('is-invalid')) {
                    this.validate_field(input)
                }
            })
        })
    }

    validate_field(input) {
        const name = input.getAttribute('name')
        const value = input.value.trim()
        let error = null

        if (!value) {
            error = input.dataset.msgRequired || 'This field is required'
        } else if (name === 'email' && !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(value)) {
            error = input.dataset.msgEmail || 'Please enter a valid email'
        } else if (name === 'phone_number' && !/^[\d\s\+\-()]{7,15}$/.test(value)) {
            error = input.dataset.msgPhone || 'Please enter a valid phone number'
        } else if (name === 'site_url' && value && !/^https?:\/\/.+|^www\..+|^[a-zA-Z0-9].*\..+/.test(value)) {
            error = input.dataset.msgUrl || 'Please enter a valid URL'
        }

        this.set_field_error(input, error)
        return !error
    }

    set_field_error(input, error) {
        let feedback = input.nextElementSibling
        if (!feedback || !feedback.classList.contains('invalid-feedback')) {
            feedback = document.createElement('div')
            feedback.classList.add('invalid-feedback')
            input.parentNode.insertBefore(feedback, input.nextSibling)
        }

        if (error) {
            input.classList.add('is-invalid')
            input.classList.remove('is-valid')
            feedback.textContent = error
        } else {
            input.classList.remove('is-invalid')
            input.classList.add('is-valid')
            feedback.textContent = ''
        }
    }

    validate_all() {
        const fields = this.send_contacts_form.querySelectorAll('input:not([type="submit"])')
        let valid = true
        fields.forEach(input => {
            if (!this.validate_field(input)) valid = false
        })
        return valid
    }

    async send_contacts(e) {
        e.preventDefault()

        if (!this.validate_all()) return

        this.send_contacts_button.setAttribute("disabled", "disabled")
        const formData = new FormData(this.send_contacts_form)

        const response = await request(`/contacts`, 'POST', formData)
        if(response.success) {
            this.show_success(response.data.message)
            this.send_contacts_form.querySelectorAll('input:not([type="submit"])').forEach(input => {
                input.value = ''
                input.classList.remove('is-valid', 'is-invalid')
            })
        } else {
            this.show_error(response.message)
        }
        this.send_contacts_button.removeAttribute("disabled")
    }

    show_success(message) {
        Swal.fire({
            title: "تم بنجاح",
            text: message,
            icon: "success"
        });
    }

    show_error(message) {
        Swal.fire({
            title: "حدث خطاْ",
            text: message,
            icon: "error"
        });
    }
}

export default new ContactsController()
