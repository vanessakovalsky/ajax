<div id="chat">
  Discutez entre ludistes
  <table id="chat-table">
    <td id="text-td">
      <div id="annonce"></div>
      <div id="text">
        <div id="loading">
          <span class="info" id="info">
            Chargement du chat en cours ...
          </span>
        </div>
      </div>
    </td>
    <td id="users-td"><div id="users">Chargement</div></td>
  </table>
  <form id="input-chat">
    <input type="text" id="chat-text" />
    <input type="button" value="Envoyer" onclick="envoyerChat(this)" />
  </form>
</div>
