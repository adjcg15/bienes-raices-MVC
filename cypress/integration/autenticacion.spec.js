/// <reference types="cypress" />

describe('Probar la Autenticación', () => {
    it('Prueba la Autenticación en /login', () => {
        cy.visit('/login');

        cy.get('[data-cy="heading-login"]').should('exist');
        cy.get('[data-cy="heading-login"]').should('have.text', 'Iniciar Sesión');

        cy.get('[data-cy="formulario-login"]').should('exist');

        //Ambos campos son obligatorios
        cy.get('[data-cy="formulario-login"]').submit();
        cy.get('[data-cy="alerta-login"]').should('exist');
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.class','error');
        cy.get('[data-cy="alerta-login"]').eq(0).should('have.text','El Email es Obligatorio');

        cy.get('[data-cy="alerta-login"]').eq(1).should('have.class','error');
        cy.get('[data-cy="alerta-login"]').eq(1).should('have.text','La Contraseña es Obligatoria');

        //El usuario exista

        //Verificar Password
    });
});