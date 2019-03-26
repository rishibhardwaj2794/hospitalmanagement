export interface UserModel {
    loggedIn: string;
    id: string;
    user_username: string;
    user_name: string;
    user_add1: string;
    user_add2: number;
    user_city: string;
    user_state: string;
    user_country: string;
    user_mobile: string;
    user_gender: string;
    user_dob: string;
    user_image: string;
  }
  
  export interface UserLoginModel {
    user_email: string;
    user_password: string;
  }