describe('template spec', () => {
  it('passes', () => {
    cy.visit('/')


    cy.getDataTest('todo-input').type('must buy a new car')
    cy.getDataTest('todo-input').should('have.value', 'must buy a new car')
    cy.getDataTest('add-button').click()
    cy.getDataTest('input-label').each(() => {
      cy.getDataTest('input-checkbox').check()
    })
    // cy.pause()
    cy.getDataTest('delete-button').click()
    cy.getDataTest('input-label').should('not.exist','must buy a new car')

    
  })
})