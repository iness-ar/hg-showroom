import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-app.js";
import { 
    getAuth, 
    signInAnonymously, 
    signInWithCustomToken, 
    onAuthStateChanged 
} from "https://www.gstatic.com/firebasejs/11.6.1/firebase-auth.js";
import { getFirestore, setLogLevel } from "https://www.gstatic.com/firebasejs/11.6.1/firebase-firestore.js";

window.db = null;
window.auth = null;
window.userId = null;
window.appId = null; 

async function initializeFirebase() {
    if (typeof __firebase_config === 'undefined' || typeof __app_id === 'undefined') {
        console.error("Firebase config or App ID is missing.");
        return;
    }

    try {
        const firebaseConfig = JSON.parse(__firebase_config);
        window.appId = typeof __app_id !== 'undefined' ? __app_id : 'default-app-id';

        const app = initializeApp(firebaseConfig);
        
        window.db = getFirestore(app);
        window.auth = getAuth(app);
        
        const auth = window.auth;
        
        if (typeof __initial_auth_token !== 'undefined' && __initial_auth_token) {
            await signInWithCustomToken(auth, __initial_auth_token);
            console.log("Firebase: Signed in with custom token.");
        } else {
            await signInAnonymously(auth);
            console.log("Firebase: Signed in anonymously.");
        }

        onAuthStateChanged(auth, (user) => {
            if (user) {
                window.userId = user.uid;
                console.log(`Firebase: User ID set to ${window.userId}`);
            } else {
                window.userId = crypto.randomUUID(); 
                console.log(`Firebase: Anonymous user or sign-out. Temporary ID set to ${window.userId}`);
            }
        });

    } catch (error) {
        console.error("Error during Firebase initialization:", error);
    }
}

initializeFirebase();
