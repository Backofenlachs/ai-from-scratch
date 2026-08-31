# AI From Scratch

Dieses kleine Projekt dient mir als Wiedereinstieg in das Thema **neuronale Netzwerke**.

Es ist gleichzeitig eine Neuauflage und Erweiterung des praktischen Teils meiner Jahresarbeit, die ich in der 12.Klasse
im Alter von ungefähr 17 Jahren über künstliche Intelligenz geschrieben habe.

## Hintergrund

In meiner damaligen Jahresarbeit habe ich mich vor allem damit beschäftigt, was neuronale Netzwerke sind, wie sie
mathematisch funktionieren und welche Gemeinsamkeiten und Unterschiede es zu biologischen neuronalen Netzwerken gibt.

Parallel dazu habe ich über einen Zeitraum von ungefähr zwei Jahren gemeinsam mit drei Freunden zwei Spiele in Unity
entwickelt und dabei viel mit C# gearbeitet. Im Rahmen meiner Beschäftigung mit KI habe ich außerdem erste Experimente
mit TensorFlow durchgeführt.

Ein wichtiger praktischer Teil meiner Jahresarbeit war jedoch ein kleines **neuronales Netzwerk, das ich vollständig**
**von Grund auf selbst implementiert habe**.

Das Netzwerk bestand ungefähr aus:

- 16 Input-Neuronen
- einer Hidden-Schicht mit 8 Neuronen
- einem Output-Layer mit 4 Neuronen
- einer einfachen, selbst implementierten Backpropagation

Das Netzwerk sollte sehr kleine Bildmuster klassifizieren. Als Eingabe dienten stark vereinfachte Graustufenbilder. 
Ziel war es unter anderem zu erkennen, ob eine Linie beziehungsweise ein Pixelmuster diagonal, vertikal oder horizontal
verlief.

Das Ganze funktionierte damals eher mäßig zuverlässig und auch die Codequalität entsprach natürlich meinem damaligen
Erfahrungsstand. Trotzdem war es für mich eines der interessantesten Projekte aus dieser Zeit, da ich dadurch viele der
theoretischen Konzepte tatsächlich selbst implementieren und ausprobieren konnte.

## Warum dieses Projekt?

Leider hatte ich es damals noch nicht besonders mit sauberen Backups.

Die theoretische Ausarbeitung meiner Jahresarbeit und die Unity-Projekte sind erhalten geblieben. Die kleineren
TensorFlow-Experimente und insbesondere mein selbst geschriebenes neuronales Netzwerk sind allerdings irgendwann in den
Tiefen alter Festplatten verschwunden.

Anstatt das alte Projekt wiederzufinden, möchte ich es heute lieber noch einmal neu entwickeln – mit meinem heutigen
Verständnis von Softwareentwicklung, saubereren Strukturen und deutlich mehr Möglichkeiten zum Experimentieren.

Dieses Repository soll deshalb vor allem ein **Freizeit- und Lernprojekt** sein.

Es geht nicht darum, möglichst schnell ein leistungsfähiges Machine-Learning-Framework zu bauen. Stattdessen möchte 
ich die einzelnen Bestandteile neuronaler Netzwerke wieder selbst implementieren, verstehen und anschließend gezielt 
verändern.

## Ziele

Im Laufe des Projekts möchte ich unter anderem mit verschiedenen Ansätzen experimentieren:

- unterschiedliche Netzwerkarchitekturen
- verschiedene Neuronentypen
- unterschiedliche Aktivierungsfunktionen
- mehrere Varianten von Backpropagation beziehungsweise Gradient Descent
- verschiedene Weight-Initialisierungen
- unterschiedliche Trainingsstrategien
- kleine Klassifikations- und Entscheidungsprobleme

Interessant ist für mich dabei insbesondere die Frage, wie sich unterschiedliche Architekturen und Parameter auf 
kleine, klar definierte Aufgaben auswirken.

Das Projekt soll also nicht nur ein einzelnes fertiges neuronales Netzwerk hervorbringen, sondern eher eine kleine 
Umgebung, in der unterschiedliche Ansätze ausprobiert und miteinander verglichen werden können.

## Warum PHP?

Das Projekt wird zunächst vollständig in **PHP** entwickelt.

Das ist für Machine Learning sicherlich nicht die naheliegendste Sprache, ist hier aber eine bewusste Entscheidung.

Ich arbeite aktuell beruflich sehr viel mit PHP und möchte für dieses Nebenprojekt nicht noch eine weitere 
Programmiersprache in meinen aktuellen Stack aufnehmen. Dadurch kann ich mich stärker auf die eigentlichen Konzepte
konzentrieren, anstatt mich gleichzeitig wieder in ein anderes Ökosystem einzuarbeiten.

Außerdem besteht dadurch langfristig die Möglichkeit, einzelne experimentelle Funktionen eventuell in mein anderes 
Projekt, das [CR-DSS](https://github.com/Backofenlachs/CR-DSS), zu integrieren.

Ob und in welcher Form das tatsächlich passiert, wird sich im Laufe des Projekts zeigen.

## Dokumentation

Eine umfangreiche formale Dokumentation ist bei diesem Repository bewusst nicht das Hauptziel.

Der Fokus liegt auf:

- Experimentieren
- Implementieren
- mathematischem Verständnis
- Vergleichen verschiedener Ansätze

Die Dokumentation wird deshalb wahrscheinlich größtenteils aus kleineren Markdown-Dateien, Diagrammen, Notizen und 
Bildern meiner handschriftlichen beziehungsweise Whiteboard-Aufzeichnungen bestehen.

Das Repository darf sich dabei mit meinem Verständnis des Themas weiterentwickeln.

**Mal schauen, was daraus wird.**
## Arbeitsweise

Im Vergleich zu meinem alten Projekt – zu dem Zeitpunkt gab es ChatGPT noch nicht – werde ich dieses Mal KI bewusst als Werkzeug mitbenutzen.

ChatGPT soll dabei vor allem als **Code-Partner und Sparringspartner** dienen. Ich werde dafür auch einen eigenen Chat nur für dieses Projekt führen, in dem ich Ideen, Architektur, mathematische Zusammenhänge und Implementierungsentscheidungen durchgehen kann.

Falls es sich anbietet, werde ich aus diesen Chats später auch ausführlichere Dokumentationen oder Zusammenfassungen generieren lassen.

Dabei gilt für mich aber eine klare Regel:

> **KI-Code wird nicht einfach kopiert.**

Auch Copilot oder andere Coding Agents werde ich bewusst nicht direkt in den Entwicklungsprozess einbauen.

Der Hauptgrund ist ziemlich simpel: Ich möchte verhindern, dass ich irgendwann anfange, komplette Teile einfach von einer KI schreiben zu lassen und am Ende Code im Projekt habe, bei dem ich selbst nicht mehr genau weiß, warum er so aufgebaut ist.

Gerade bei so einem Projekt wäre das komplett am Ziel vorbei.

Das Ganze soll ja genau dazu dienen, die einzelnen Teile eines neuronalen Netzwerks selbst wieder zu verstehen und umzusetzen. Deshalb soll jede wichtige Zeile Code bewusst implementiert und nachvollzogen werden können.

KI darf helfen, erklären, hinterfragen oder auf Probleme aufmerksam machen – aber sie soll mir die eigentliche Arbeit nicht abnehmen.

### Fachliche Quellen

Für das fachliche Wissen werde ich mich vor allem an normalen Informatik- und Lernquellen bedienen, zum Beispiel:

- Informatikseiten wie Informatikseite.de
- YouTube-Videos  (z.b.: the morpheus tutorials, 3blue1brown, dr. data sience, Emergent Garden, ...)
- Artikel und Dokumentationen und vorlesungen
- eigene alte Notizen und Aufzeichnungen

Bei der technischen Umsetzung wird natürlich auch viel über Stack Overflow, Foren und offizielle Dokumentationen laufen.

### Code-Standards

Auch wenn das hier nur ein Freizeit- und Lernprojekt ist, möchte ich trotzdem einen gewissen Code-Standard halten.

Dabei gelten für mich vor allem:

- **Clean Code**  
  Nicht komplett auf die Spitze getrieben, aber bewusst lesbar und verständlich.

- **Separation of Concerns**  
  Unterschiedliche Aufgaben sollen auch wirklich getrennt bleiben.

- **Trennung der Business Components**  
  Netzwerk, Neuronen, Training, API usw. sollen nicht unnötig miteinander vermischt werden.

- **Abstrahieren nur wenn nötig**  
  Ich möchte nicht schon am Anfang Interfaces, Factories und fünf zusätzliche Layer bauen, nur weil man es theoretisch könnte.

Abstraktionen sollen dann entstehen, wenn es wirklich einen Grund dafür gibt.

Das Projekt soll also sauber genug bleiben, dass man gut weiterbauen und experimentieren kann, ohne direkt in unnötigem Overengineering zu landen.