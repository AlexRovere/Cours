import { Subject } from "rxjs";
import { User } from "../models/user.model";


export class UserService {
    private users: User[] = [
        new User('john', 'doe', 'doe@hotmail.com', 'bière', ['foot', 'boxe'])
    ];
    userSubject = new Subject<User[]>();

    emitUsers() {
        this.userSubject.next(this.users.slice());
    }

    addUsers(user: User) {
        this.users.push(user);
        this.emitUsers();
    }
}
