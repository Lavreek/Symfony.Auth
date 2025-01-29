import { Controller } from '@hotwired/stimulus';

export default class extends Controller {
    static targets = ["username", "password"]

    getAuth() {
        fetch('/auth/get', {
            method: "POST",
            body: JSON.stringify({
                username: this.usernameTarget.value,
                password: this.passwordTarget.value
            }),
            headers: {
                "Content-Type": "application/json; charset=UTF-8"
            }
        })
            .then(response => response.text())
            .then((text) => console.log(text))
    }
}
