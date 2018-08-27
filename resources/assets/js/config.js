export const apiDomain = Laravel.apiDomain;
export const siteName = Laravel.siteName;
export const fileUrl = Laravel.fileUrl;

export const api = {
	login: apiDomain + '/authenticate',
	currentUser: apiDomain + '/user',
    getFilms: apiDomain + '/films',
    createFilm: apiDomain + '/film/create'
};
