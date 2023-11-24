import axios from 'axios'

export const consultCep = async () => {
  try {
    return await axios.get(
      'https://h-apigateway.conectagov.estaleiro.serpro.gov.br/api-cep/v1/consulta/cep/98400000'
    )
  } catch (error) {
    console.error('Error:', error)
    throw error
  }
}
