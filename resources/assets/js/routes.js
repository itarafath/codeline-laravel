import Home from './components/film/Home';
import Login from './components/login/Login';
import Register from './components/login/Register';
import Film from './components/film/Film';
import FilmCreate from './components/film/FilmCreate';

export default [
    {
        path: '/films',
        name: 'index',
        component: Home,
    },
    {
        path: '/films/:slug',
        name: 'film',
        component: Film,
    }, {
        path: '/film/create',
        name: 'film_create',
        component: FilmCreate,
        meta: {requiresAuth: true}
    },
    {
        path: '/login',
        name: 'login',
        component: Login,
    },
    {
        path: '/register',
        name: 'register',
        component: Register,
    }
];