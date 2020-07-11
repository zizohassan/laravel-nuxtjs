export default (context, inject) => {
    const images = (img, type) => {
        let t = '-cropped';
        if (type !== undefined) {
            t = '-' + type;
        }
        if(type === 'org'){
            t = '';
        }
        let imgName = img.split('.');
        return context.env.imageUrl + imgName[0] + t + '.' + imgName[1];
    }
    // Inject $hello(msg) in Vue, context and store.
    inject('images', images);
    // For Nuxt <= 2.12, also add 👇
    context.$images = images;
}