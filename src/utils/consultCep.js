import axios from 'axios'

export const consultCep = async (cep) => {
  try {
    return await axios.get(`https://viacep.com.br/ws/${cep}/json/`)
  } catch (error) {
    console.error('Error:', error)
    throw error
  }
}
