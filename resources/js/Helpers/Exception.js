import User from "./User";
class Exception {

    handle(error) {
        this.expired(error.response.data.error)
    }

    expired(error) {
        if (error = "Token is invalid") {
            User.logout()
        }
    }
}


export default Exception = new Exception();
