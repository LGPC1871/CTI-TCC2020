/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
package model.dao;

import connection.ConnectionFactory;
import java.sql.Connection;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.util.ArrayList;
import java.util.logging.Level;
import java.util.logging.Logger;
import javax.swing.JOptionPane;
import model.domain.Ano;
/**
 *
 * @author julia
 */
public class AnoDAO {
    
    public void create(Ano a){
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        
        try{
            stmt = con.prepareStatement("INSERT INTO edicao (titulo, ano) VALUES (?,?)");
            stmt.setString(1,a.getTitulo());
            stmt.setInt(2,a.getAno());
            
            stmt.executeUpdate();
            
            JOptionPane.showMessageDialog(null, "Ano cadastrada com sucesso!!!");
            
        } catch(SQLException ex){
            Logger.getLogger(AnoDAO.class.getName()).log(Level.SEVERE, null, ex);
            JOptionPane.showMessageDialog(null, "Erro ao criar Ano: "+ex);
            
        }finally{
            ConnectionFactory.closeConnection(con, stmt);
        }
    }
         public void delete(Ano a){
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        
        try {
            stmt = con.prepareStatement("DELETE FROM edicao WHERE id = ?");
            stmt.setInt(1,a.getId());
            
            stmt.executeUpdate();
            
            JOptionPane.showMessageDialog(null, "ANO EXCLUIDA COM SUCESSO!!!");
        } catch (SQLException ex) {
            Logger.getLogger(AnoDAO.class.getName()).log(Level.SEVERE, null, ex);
            JOptionPane.showMessageDialog(null, "ERRO AO EXCLUIR O ANO : "+ex);
        } finally{
            ConnectionFactory.closeConnection(con, stmt);
        }
        
    }
        public java.util.List<Ano> read() {
        
        Connection con = ConnectionFactory.getConnection();
        PreparedStatement stmt = null;
        ResultSet rs = null;
        
        java.util.List<Ano> anos = new ArrayList<>();
        
        try {
            stmt = con.prepareStatement("SELECT * FROM edicao");
            rs = stmt.executeQuery();
            
            while(rs.next()){
                
                Ano ano = new Ano();
                ano.setId(rs.getInt("id"));
                ano.setTitulo(rs.getString("titulo"));
                ano.setAno(rs.getInt("ano"));
                anos.add(ano);
                
            }
            
        } catch (SQLException ex) {
            Logger.getLogger(AnoDAO.class.getName()).log(Level.SEVERE, null, ex);
        }finally{
            ConnectionFactory.closeConnection(con, stmt, rs);
        }
        
        return anos;
    }
    
}
