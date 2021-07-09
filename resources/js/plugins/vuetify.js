import Vuetify from "vuetify"
import Vue from 'vue'
// import colors from 'vuetify/lib/util/colors'
Vue.use(Vuetify)

const opts = {
    icons: {
        iconfont: "mdi", // default - only for display purposes
    },
};

export default new Vuetify(opts);
