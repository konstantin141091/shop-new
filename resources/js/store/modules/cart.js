export default {
  // namespaced: true,
  state: {
    CART: JSON.parse(localStorage.getItem('cart' ) || '[]'),
  },

  getters: {
    CART (state) {
      return state.CART
    },
    CART_TOTAL_PRICE: state => {
      return state.CART.reduce((total, product) => {
        return Math.floor((total + product.quantity * product.price) * 100) / 100;
      }, 0)
    },
    CART_TOTAL_QUANTITY: state => {
      return state.CART.reduce((total, product) => {
        return total + product.quantity;
      }, 0)
    }
  },

  mutations: {
    PUSH_PRODUCT_TO_CART: (state, product) => {
      state.CART.push(product);
    },
    SAVE_CART: (state) => {
      localStorage.setItem('cart', JSON.stringify(state.CART))
    },
    INCREMENT_PRODUCT: (state, id) => {
      const cartItem = state.CART.find(item => item.id === id);
      cartItem.quantity++;
      cartItem.total = Math.floor((cartItem.quantity * cartItem.price) * 100) / 100;
    },
    DECREMENT_PRODUCT: (state, id) => {
      const cartItem = state.CART.find(item => item.id === id);
      cartItem.quantity--;
      cartItem.total = Math.floor((cartItem.quantity * cartItem.price) * 100) / 100;
    },
    INCREMENT_PRODUCT_INDEX: (state, index) => {
      state.CART[index].quantity++;
      state.CART[index].total = Math.floor((state.CART[index].quantity * state.CART[index].price) * 100) / 100;
    },
    DECREMENT_PRODUCT_INDEX: (state, index) => {
      state.CART[index].quantity--;
      state.CART[index].total = Math.floor((state.CART[index].quantity * state.CART[index].price) * 100) / 100;
    },
    DELETE_FROM_CART: (state, index) => {
      state.CART.splice(index, 1);
    },

    // DELETE_ALL_CART: (state) => {
    //   state.cart = [];
    // },
  },

  actions: {
    ADD_TO_CART: ({commit, state}, product) => {
      const cartItem = state.CART.find(item => item.id === product.id);
      if (!cartItem) {
        product.quantity = 1;
        product.total = Math.floor((product.quantity * product.price) * 100) / 100;
        commit('PUSH_PRODUCT_TO_CART', product)
      } else {
        commit('INCREMENT_PRODUCT', product.id)
      }
      commit('SAVE_CART')
    },

    INCREMENT_TO_PRODUCT_INDEX: ({commit}, index) => {
      commit('INCREMENT_PRODUCT_INDEX', index);
      commit('SAVE_CART');
    },
    DECREMENT_TO_PRODUCT_INDEX: ({commit, state}, index) => {
      if(state.CART[index].quantity > 1) {
        commit('DECREMENT_PRODUCT_INDEX', index);
      } else {
        commit('DELETE_FROM_CART', index);
      }
      commit('SAVE_CART');
    },


    DELETE_FROM_CART_INDEX: ({commit}, index) => {
      commit('DELETE_FROM_CART', index);
      commit('SAVE_CART');
    },

    // async API_ADD_TO_CART ({ dispatch }, credentials) {
    //   await axios.get('/sanctum/csrf-cookie');
    //   const answer = await axios.post('/cart', credentials)
    //     .then((response) => {
    //       return response;
    //     })
    //     .catch((error) => {
    //       return error.response;
    //     });
    //   return answer;
    // },

    // CLEAR_ALL_CART: ({state}) => {
    //   localStorage.clear();
    //   state.CART = [];
    // },
  }
}
