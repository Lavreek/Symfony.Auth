import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["type", "username", "password", "token", "error"]

    create() {
        fetch('/register/create', {
            method: "POST",
            body: JSON.stringify({
                type: this.typeTarget.value,
                credentials: {
                    username: this.usernameTarget.value,
                    password: this.passwordTarget.value
                },
                token: this.tokenTarget.value
            }),
            headers: {
                "Content-Type": "application/json; charset=UTF-8"
            }
        })
            .then(response => response.text())
            .then((text) => {
                let decodedAnswer = JSON.parse(text);

                if (decodedAnswer['success'] !== undefined) {
                    if (decodedAnswer['success'] === true) {
                        if (decodedAnswer['redirectToRoute'] !== undefined) {
                            document.location.replace(decodedAnswer['redirectToRoute']);
                        }

                    } else {
                        this.errorTarget.textContent = decodedAnswer['message']
                    }

                } else {
                    this.errorTarget.textContent = decodedAnswer['message']
                }
            })
    }
}
