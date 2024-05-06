// Import the functions you need from the SDKs you need
import {initializeApp} from "firebase/app";
import {getMessaging, getToken} from "firebase/messaging";

// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
    apiKey: "AIzaSyBIGBr6TN6IDCYUrmiQNiI19uIFpiLbxaE",
    authDomain: "classroom-1dbcc.firebaseapp.com",
    projectId: "classroom-1dbcc",
    storageBucket: "classroom-1dbcc.appspot.com",
    messagingSenderId: "768181467336",
    appId: "1:768181467336:web:ba73e0707fff80cdc20dfd",
    measurementId: "G-4PYCJJ8F6S"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const messaging = getMessaging(app);






